
<?php
include_once 'php/includes/database_handler.include.php';

$mode = $_GET['mode'];


if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

if($mode == "delete")
{
    $id = $_GET['id'];
    $sql = "DELETE FROM GENRE WHERE GenreID = $id"; 

    if (mysqli_query($conn, $sql)) 
    {   
        mysqli_close($conn);
        header("Location: genre_control.php");
        exit;
    } 
    else 
    {
        echo "Error deleting record";
    }
}
elseif($mode == "edit")
{

    include_once 'admin.php';
    
    ?>

    <style>
    .child_div {
    height: 100px;
    width: 200px;
    overflow: hidden;
    position: relative;
    display: inline-block;
        float:bottom;
    }
        </style>

    <div style="width:75%; position:relative; left:20%">

    <?php
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"edit\">Type a new genre</label><br>
        <input type=\"text\" id=\"edit\" name=\"editgen\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";

        if(isset($_POST['editgen']) && !empty($_POST['editgen']))
        {
            if ($stmt = mysqli_prepare($conn, "INSERT INTO GENRE (GenreName) VALUES (?)")) 
            {
                mysqli_stmt_bind_param($stmt, "s", $_POST['editgen']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "Genre added!";
            
            } 
            else 
            {
                printf("MySQL Error: %s\n", mysqli_error($conn));
            }
        } 
        }
?>

</div>