<?php

//checks if user got here by pressing button
if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $username = $_POST["userid"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $password_repeat = $_POST["pwdrepeat"];

    if(isset($_POST["mobile"]))
    {
        $phone = $_POST["mobile"];
    }
    else
    {
        $phone = "";
    }
    
    if(isset($_POST["address"]))
    {
        $address = $_POST["address"];;
    }
    else
    {
        $address = "";
    }
   

    require_once('database_handler.include.php');
    require_once('general_functions.include.php');

    //check errors in input forms
    if(is_empty_registerform($name, $username, $email, $password, $password_repeat) === true)
    {
        header("location: ../../register.php?error=empty_input");
        exit();
    }

    if(is_valid_username($username) === false)
    {
        header("location: ../../register.php?error=invalid_username");
        exit();
    }

    if(is_valid_email($email) === false)
    {
        header("location: ../../register.php?error=invalid_email");
        exit();
    }

    if(password_match($password, $password_repeat) === false)
    {
        header("location: ../../register.php?error=pwd_match");
        exit();
    }

    if(user_exists($conn, $username, $email) === true)
    {
        header("location: ../../register.php?error=user_already_exists");
        exit();
    }
    create_user($conn, $name, $username, $email, $password, $phone, $address);
}
else
{
    header("location: ../../register.php");
    exit();
}