<?php
    include_once 'database_handler.include.php';

    $id = $_GET['id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM events WHERE EventID = $id"; 

    if (mysqli_query($conn, $sql)) 
    {
        mysqli_close($conn);
        header('Location: ../../event_control.php');
        exit;
    } 
    else 
    {
        echo "Error deleting record";
    }
?>
