<?php
    include_once 'database_handler.include.php';

    $id = $_GET['id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM INTERPRET WHERE InterpretID = $id"; 

    if (mysqli_query($conn, $sql)) 
    {
        mysqli_close($conn);
        header('Location: ../../interpret_control.php');
        exit;
    } 
    else 
    {
        echo "Error deleting record";
    }
?>
