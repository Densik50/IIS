<?php

$server_name = "localhost";     //xpaulo04-server01.database.windows.net
$database_username = "root";    //rootxpaulo04
$database_password = "root_password123";    //Xpaulo04root
$database_name = "iis_project";             //

$conn = mysqli_connect($server_name, $database_username, $database_password, $database_name);

if(!$conn)
{
    die('Connection failed: '.mysqli_connect_error());
}