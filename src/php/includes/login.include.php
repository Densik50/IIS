<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["userid"];
    $password = $_POST["pwd"];

    require_once 'database_handler.include.php';
    require_once 'general_functions.include.php';

    //check errors in input forms
    if(is_empty_loginform($username, $password) === true)
    {
        header("location: ../../login.php?error=empty_input");
        exit();
    }

    login_user($conn, $username, $password);
}
else
{
    header("location: ../../login.php");
    exit();
}