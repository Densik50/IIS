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

function is_valid_date($date) 
{
    $result;
    if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/",$date))

    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function is_valid_time($time) 
{
    $result;
    if(preg_match("/^(0[0-9]|1[0-9]|2[0-3]):(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])$/", $time))
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

function user_exists_byid($conn, $id)
{   
    //prepared statement to prevent injection
    $sql = "SELECT * FROM USERS WHERE UserID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../event.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
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
    $sql = "SELECT * FROM EVENTS WHERE Name = ?;";
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

function event_exists_byid($conn, $id)
{
    $sql = "SELECT * FROM EVENTS WHERE EventID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../event.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
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

function get_my_interprets($conn, $myid)
{
    $query = "SELECT * FROM INTERPRET WHERE Owner = $myid;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function get_my_events($conn, $myid)
{
    $query = "SELECT * FROM EVENTS WHERE UserID = $myid;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function interpret_exists($conn, $name)
{
    $sql = "SELECT * FROM INTERPRET WHERE Name = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../add_intepret.php?error=stmt_failed");
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

function interpret_exists_byid($conn, $id)
{
    $sql = "SELECT * FROM INTERPRET WHERE InterpretID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../interpret.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
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

function create_user($conn, $name, $username, $email, $password, $mobile, $address)
{
    $sql = "INSERT INTO USERS (Fullname, Username, Email, Password, Mobile, Address, is_admin, is_banned) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../register.php?error=stmt_failed&name=$name&userid=$username&email=$email&mobile=$mobile&address=$address");
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
    $zero = 0;
    $query = "INSERT INTO EVENTS (Name, Describtion, Address, Start_date, Start_time, End_date, End_time, Price, Capacity, Reserved, MaxCapacity, UserID)
                VALUES ('$name', '$describtion', '$address', '$start_date', '$start_time', '$end_date', '$end_time', $price, $zero, $zero, $maxcapacity, $owner);";
    //create new event
    if (mysqli_query($conn, $query) === FALSE) {
        header("location: ../../create_event.php?error=stmt_failed&errordes=".mysqli_error($conn));
        exit();
    }
}

function add_interpret($conn, $name, $owner, $describtion)
{
    $query = "INSERT INTO INTERPRET(Owner, Describtion, Name) VALUES ($owner,'$describtion','$name');";
    //add new interpret
    if (mysqli_query($conn, $query) === FALSE) {
        header("location: ../../add_interpret.php?error=stmt_failed&errordes=".mysqli_error($conn));
        exit();
    }
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

function create_eventgenres($conn, $checkboxdata, $name)
{
    $sqlquery = "SELECT EventID FROM EVENTS WHERE Name = '$name';";
    if ($result = mysqli_query($conn, $sqlquery)) {
        while($row = mysqli_fetch_assoc($result))
        {
            foreach($checkboxdata as $element):
                $var = $row["EventID"];
                $sql = "INSERT INTO EVENT_GENRES (EventID, GenreID) VALUES ($var, $element);";
                if(!mysqli_query($conn, $sql))
                {
                    header("location: ../../create_event.php?error=failed_adding_genre");
                    exit();
                }
            endforeach;
            header("location: ../../create_event.php?error=none");
            exit();
        } 
    }
    else
    {
        header("location: ../../create_event.php?error=doesntexist");
        exit();
    }
}

function create_interpretgenres($conn, $checkboxdata, $name)
{
    $sqlquery = "SELECT InterpretID FROM INTERPRET WHERE Name = '$name';";
    if ($result = mysqli_query($conn, $sqlquery)) {
        while($row = mysqli_fetch_assoc($result))
        {
            foreach($checkboxdata as $element):
                $var = $row["InterpretID"];
                $sql = "INSERT INTO INTERPRET_GENRES (InterpretID, GenreID) VALUES ($var, $element);";
                if(!mysqli_query($conn, $sql))
                {
                    header("location: ../../add_interpret.php?error=failed_adding_genre");
                    exit();
                }
            endforeach;
            header("location: ../../add_interpret.php?error=none");
            exit();
        } 
    }
    else
    {
        header("location: ../../add_interpret.php?error=doesntexist");
        exit();
    }
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

function get_genre_byid($conn, $genre_id)
{
    $sql = "SELECT * FROM GENRE WHERE GenreID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../create_event.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $genre_id);
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

function get_allevents_genres($conn, $event_id)
{
    $sql = "SELECT * FROM EVENT_GENRES WHERE EventID = $event_id;";
    $stmt = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_array($stmt)) {
        $data[] = $row;
    }
    return $data;    
    mysqli_stmt_close($stmt);
}

function get_allinterprets_genres($conn, $interpret_id)
{
    $sql = "SELECT * FROM INTERPRET_GENRES WHERE InterpretID = $interpret_id;";
    $stmt = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_array($stmt)) {
        $data[] = $row;
    }
    return $data;    
    mysqli_stmt_close($stmt);
}

function get_all_events($conn, $order_by, $asc_dec, $where)
{
    $query = "SELECT * FROM EVENTS $where ORDER BY `EVENTS`.`$order_by` $asc_dec;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function get_all_interprets($conn, $order_by, $asc_dec, $where)
{
    $query = "SELECT * FROM INTERPRET $where ORDER BY `INTERPRET`.`$order_by` $asc_dec;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function cashiers_byeventid($conn, $id)
{
    $query = "SELECT * FROM EVENT_CASHIERS WHERE EventID = $id;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function events_bycashierid($conn, $id)
{
    $query = "SELECT * FROM EVENT_CASHIERS WHERE UserID = $id;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function is_cashier($conn, $eventid, $userid)
{
    $query = "SELECT * FROM EVENT_CASHIERS WHERE EventID = $eventid AND UserID = $userid;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    if(count($data) == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function is_owner($conn, $eventid, $userid)
{
    $query = "SELECT * FROM EVENTS WHERE EventID = $eventid AND UserID = $userid;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    if(count($data) == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function is_owner_interpret($conn, $interpretid, $userid)
{
    $query = "SELECT * FROM INTERPRET WHERE InterpretID = $interpretid AND Owner = $userid;";

    $result = mysqli_query($conn, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    if(count($data) == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function six_newest_events($conn)
{
    $query = "SELECT * FROM EVENTS ORDER BY `EVENTS`.`EventID` DESC;";

    $result = mysqli_query($conn, $query);

    $data = array();
    $i = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        if($i == 6) break;
        $i++;
        $data[] = $row;
    }
    return $data;
}

function six_newest_interprets($conn)
{
    $query = "SELECT * FROM INTERPRET ORDER BY `INTERPRET`.`InterpretID` DESC;";

    $result = mysqli_query($conn, $query);

    $data = array();
    $i = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        if($i == 6) break;
        $i++;
        $data[] = $row;
    }
    return $data;
}

function make_reservation($conn, $event_id, $user_id)
{
    $query = "INSERT INTO EVENT_TICKETS(EventID, Buyer, Paied) VALUES($event_id, $user_id, 0);";
    mysqli_query($conn, $query);
    $query = "UPDATE EVENTS SET Reserved = Reserved + 1 WHERE EventID = $event_id;";
    mysqli_query($conn, $query);
}

function get_ticket_bytid($conn, $ticket_id)
{
    $query = "SELECT * FROM EVENT_TICKETS WHERE TicketID = $ticket_id;";
    $result = mysqli_query($conn, $query);
    
    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function get_tickets_byuid($conn, $user_id)
{
    $query = "SELECT * FROM EVENT_TICKETS WHERE Buyer = $user_id;";
    $result = mysqli_query($conn, $query);
    
    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function get_tickets_byeid($conn, $event_id)
{
    $query = "SELECT * FROM EVENT_TICKETS WHERE EventID = $event_id;";
    $result = mysqli_query($conn, $query);
    
    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function get_ticketids($conn, $event_id, $user_id)
{
    $query = "SELECT * FROM EVENT_TICKETS WHERE EventID = $event_id AND Buyer = $user_id;";
    $result = mysqli_query($conn, $query);
    
    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    return $data;
}

function set_aspaied($conn, $ticket_id, $event_id)
{
    $query = "UPDATE EVENT_TICKETS SET Paied = 1 WHERE TicketID = $ticket_id;";
    mysqli_query($conn, $query);

    $query = "UPDATE EVENTS SET Capacity = Capacity + 1 WHERE EventID = $event_id;";
    mysqli_query($conn, $query);

    $query = "UPDATE EVENTS SET Reserved = Reserved - 1 WHERE EventID = $event_id;";
    mysqli_query($conn, $query);
}