<?php
    include_once 'database_handler.include.php';

   

    $id = $_GET['id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE users
    SET is_banned = 0
    WHERE UserID = $id"; 

    if (mysqli_query($conn, $sql)) 
    {
        mysqli_close($conn);
        header('Location: ../../user_control.php');
        exit;
    } 
    else 
    {
        echo "Error deleting record";
    }
?>
