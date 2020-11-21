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
    $sql = "SELECT * FROM OSOBA WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_ue_failed");
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

function create_user($conn, $name, $username, $email, $password)
{
    //prepared statement to prevent injection
    $sql = "INSERT INTO OSOBA (Meno, Username, Email, Password) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_cu_failed");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashed_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../register.php?error=none");
    exit();
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
        $_SESSION["userid"] = $userid_exists["Username"];
        $_SESSION["OsobaID"] = $userid_exists["OsobaID"];
        header("location: ../../index.php");
        exit();
    }
}