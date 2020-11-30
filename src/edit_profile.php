<?php
    include_once 'header.php';
    include_once 'php/includes/database_handler.include.php';
?>

<style>
.child_div {
 height: 100px;
 width: 200px;
 overflow: hidden;
 position: relative;
 display: inline-block;
    float:bottom;
 }
    </style>

<div class="child-div">

<?php

    $info = $_GET['info'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($info == "username")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"uname\">Your Username</label><br>
        <input type=\"text\" id=\"uname\" name=\"username\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "fullname")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"fname\">Your fullname</label><br>
        <input type=\"text\" id=\"fname\" name=\"fullname\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "email")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"email\">Your Email address</label><br>
        <input type=\"text\" id=\"email\" name=\"email\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "mobile")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"mnum\">Your mobile number</label><br>
        <input type=\"text\" id=\"mnum\" name=\"mobilenum\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "address")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"addr\">Your address</label><br>
        <input type=\"text\" id=\"addr\" name=\"address\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "password")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"pass\">Your Password</label><br>
        <input type=\"password\" id=\"pass\" name=\"password\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }




    $user = $_SESSION["Username"];
        require_once 'php/includes/database_handler.include.php';
        require_once 'php/includes/general_functions.include.php';





    if(isset($_POST['username']) && !empty($_POST['username']))
    {      
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Username = ? WHERE UserID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Username Changed!";
            $_SESSION['Username'] = $_POST['username']; 
            
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['fullname']) && !empty($_POST['fullname']))
    {
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Fullname = ? WHERE UserID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['fullname']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Fullname Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['email']) && !empty($_POST['email']))
    {
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Email = ? WHERE UserID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Username Changed!";
            //$_SESSION['Email'] = $_POST['email'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['mobilenum']) && !empty($_POST['mobilenum']))
    {
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Mobile = ? WHERE UserID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['mobilenum']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Mobile number Changed!";
            //$_SESSION['Mobile'] = $_POST['mobilenum'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['address']) && !empty($_POST['address']))
    {
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Address = ? WHERE UserID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['address']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Address Changed!";
            //$_SESSION['Address'] = $_POST['address'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['password']) && !empty($_POST['password']))
    {
        $userid_exists = user_exists($conn, $user, $user);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE users SET Password = ? WHERE UserID = $idd")) 
        {
            $pass_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "s", $pass_hashed);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Address Changed!";
            //$_SESSION['Address'] = $_POST['address'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
   
?>

</div>