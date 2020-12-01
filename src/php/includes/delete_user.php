
    <!--<script type="text/javascript">
    function load_back() 
    {
        $(function() 
        {
            $('#admincon').load('user_control.php');
        });
    }
    </script>-->
<?php
    include_once 'database_handler.include.php';

    $id = $_GET['id'];
?>



<?php
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM users WHERE UserID = $id"; 

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
