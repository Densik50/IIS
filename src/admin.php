<?php
    include_once 'header.php';
    //include_once 'left_bar.php';
    include_once 'php/includes/database_handler.include.php';
    include_once 'php/includes/general_functions.include.php';
?>

<link href="css/browse.css" rel="stylesheet">

<style>
    a{
        text-decoration: none;
        color: black;
        font-weight: 600;
        
    }

    a:hover{
        text-decoration: solid;
        color: white;
    }

    .fullscreen-container{
        overflow: auto;
        width: 75vw;
    }

    .lala{
        position: inline;
        width: 10%;
    }

    #maincon{
        width: 100vw;
       
    }

</style>

<?php


    if(isset($_SESSION["admin"]))
    {   
        
        $user_data = user_exists($conn, $_SESSION["Username"], $_SESSION["Username"]);
        echo 'Welcome';
        if($_SESSION["admin"] === 0)
        {
            echo "Restricted access!";
        }
        else
        { 
            
?>


                        <!-- SITE START -->
<div class="container" id="maincon">
    <div class="sidebar" style="width:5%;">
        <div class="sidebar_background navbar navbar-dark bg-dark" style="width:15%;">
            <nav class="sidenav navbar navbar-vertical navbar-expand-xs navbar-light position-left sidebar-left" id="sb">
            <div class="scroll-wrapper" style="position: relative;">
                <div class="scroll-content" >
                    <div class="sidenav-header">
                        <h4>Administration</h4>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item" id="user_control">
                            <a class="nav-link" href="user_control.php">
                            <span class="nav-link-text">Users</span></a>
                        </li>
                        <li class="nav-item" id="event_control">
                            <a class="nav-link" href="event_control.php">
                            <span class="nav-link-text">Events</span></a>
                        </li>
                        <li class="nav-item" id="interpret_control">
                            <a class="nav-link" href="interpret_control.php">
                            <span class="nav-link-text">Interprets</span></a>
                        </li>
                        <li class="nav-item" id="genre_control">
                            <a class="nav-link" href="genre_control.php">
                            <span class="nav-link-text">Genres</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </div>
    </div>   

    
        
  
            
            
                <!-- Modal 
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>-->

        </div>
    
</div>
                <?php
                    }
                
                }
                else
                {
                    header("location: login.php");
                    exit();
                }
            ?>



<!-- SITE END -->

<?php
    
?>