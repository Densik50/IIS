
<?php
    include_once 'php/includes/database_handler.include.php';

   
    //get id attribute from url set by BAN USER button in user_control
    $id = $_GET['id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    //update is_banned value to true
    $sql = "UPDATE users
    SET is_banned = 1
    WHERE UserID = $id"; 

    if (mysqli_query($conn, $sql)) 
    {
        mysqli_close($conn);

        //we go back to admin.php and set boo value to 1 - script in admin.php will know what div to load into page's container
        //why? we dont want admin to open a section from leftbar again and again after every action with users
        header('Location: admin.php?boo=1'); 
        exit;

    } 
    else 
    {
        echo "Error deleting record";
    }

    
?>

