<?php
    include_once 'header.php';
    include_once 'php/includes/database_handler.include.php';
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

<div class="child-div">

<?php

    $info = $_GET['info'];
    $idint = $_GET['interpret_id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($info == "Name")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"iname\">Interpret's name</label><br>
        <input type=\"text\" id=\"iname\" name=\"interpretname\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Describtion")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"desc\">Interpret's description</label><br>
        <input type=\"text\" id=\"desc\" name=\"describtion\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }




    $user = $_SESSION["Username"];
        require_once 'php/includes/database_handler.include.php';
        require_once 'php/includes/general_functions.include.php';





    if(isset($_POST['interpretname']) && !empty($_POST['interpretname']))
    {      
        if ($stmt = mysqli_prepare($conn, "UPDATE INTERPRET SET Name = ? WHERE InterpretID = $idint")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['interpretname']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Name Changed!";         
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['describtion']) && !empty($_POST['describtion']))
    {

        if ($stmt = mysqli_prepare($conn, "UPDATE INTERPRET SET Describtion = ? WHERE InterpretID = $idint")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['describtion']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Description Changed!";      
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
   
?>

</div>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
    
</html>