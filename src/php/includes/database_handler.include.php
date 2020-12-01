<?php

$server_name = "localhost";
$database_username = "xpaulo04project";
$database_password = "Root_password123";
$database_name = "iisprojectxpaulo04";

$conn = mysqli_connect($server_name, $database_username, $database_password, $database_name);

if(!$conn)
{
    die('Connection failed: '.mysqli_connect_error());
}