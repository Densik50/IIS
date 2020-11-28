<?php

$server_name = "localhost";
$database_username = "root";
$database_password = "root_password123";
$database_name = "iis_project";

$conn = mysqli_connect($server_name, $database_username, $database_password, $database_name);

if(!$conn)
{
    die('Connection failed: '.mysqli_connect_error());
}