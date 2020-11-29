<?php

function is_empty_registerform($name, $username, $email, $password, $password_repeat)
{
    $result;
    if(empty($name) || empty($username) || empty($email) || empty($password) || empty($password_repeat))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function is_empty_loginform($username, $password)
{
    $result;
    if(empty($username) || empty($password))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function is_valid_username($username) 
{
    $result;
    if(preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function is_valid_email($email)
{
    $result;
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function password_match($password, $password_repeat)
{
    $result;
    if($password === $password_repeat)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function user_exists($conn, $username, $email)
{   
    //prepared statement to prevent injection
    $sql = "SELECT * FROM USERS WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result_date = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_date))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function event_exists($conn, $name)
{
    $sql = "SELECT * FROM EVENTS WHERE NAME = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../create_event.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function get_info($conn, $username, $email)
{   
    //prepared statement to prevent injection
    $sql = "SELECT * FROM USERS WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result_date = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_date))
    {
        $row["Password"] = "Restricted";
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function create_user($conn, $name, $username, $email, $password, $mobile, $address)
{
    $sql = "INSERT INTO USERS (Fullname, Username, Email, Password, Mobile, Address, is_admin, is_banned) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_failed");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $false = 0;
    mysqli_stmt_bind_param($stmt, "ssssssii", $name, $username, $email, $hashed_password, $mobile, $address, $false, $false);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../register.php?error=none");
    exit();
}

function create_event($conn, $name, $describtion, $address, $start_date, $start_time, $end_date, $end_time, $price, $maxcapacity, $owner)
{
    $capacity = 0;
    $sql = "INSERT INTO EVENTS (Name, Describtion, Address, Start_date, Start_time, End_date, End_time, Price, Capacity, MaxCapacity, UserID)
                VALUES ($name, $describtion, $address, $start_date, $start_time, $end_date, $end_time,  $price, $capacity, $maxcapacity, $owner);";

    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM EVENTS WHERE Name = $name;";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function login_user($conn, $username, $password)
{
    $userid_exists = user_exists($conn, $username, $username);

    if($userid_exists === false)
    {
        header("location: ../../login.php?error=wrong_login");
        exit();
    }

    $password_hashed = $userid_exists["Password"];
    $check_password = password_verify($password, $password_hashed);

    if($check_password === false)
    {
        header("location: ../../login.php?error=wrong_login");
        exit();
    }
    else if($check_password === true)
    {
        session_start();
        $_SESSION["Username"] = $userid_exists["Username"];
        $_SESSION["UserID"] = $userid_exists["UserID"];
        
        if($userid_exists["is_admin"] === 1)
        {
            $_SESSION["admin"] = $userid_exists["is_admin"];
        }
        header("location: ../../index.php");
        exit();
    }
}

function create_eventgenre($conn, $eventid, $genreid)
{
    $sql = "INSERT INTO EVENT_GENRES (EventID, GenreID) VALUES ($eventid, $genreid);";
    mysqli_query($conn, $sql);
}

function get_genres($conn)
{
    $sql = "SELECT * FROM GENRE";
    $stmt = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_array($stmt)) {
        $data[] = $row;
    }
    return $data;    
    mysqli_stmt_close($stmt);
}