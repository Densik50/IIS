<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>

        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
         <!-- Our stuff -->
        <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
        <script src='js/main.js'></script>

        <title>SITE_TITLE</title>
    </head>
    <body class="bg-light">

        <!-- NAVBAR -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mynavbar"> 
            <a class="navbar-brand" href="index.php#">SITE_NAME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interprets.php">Interprets <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav mr-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <li class="nav-item">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </li>
                        <li class="nav-item">
                            <button class="btn my-2 my-sm-0 nav-link" type="submit">Search</button>
                        </li>
                    </form>
                </ul>
                
                <?php
                    if(isset($_SESSION["UserID"]))
                    {
                        echo   "<ul class=\"navbar-nav nick\">
                                    <li class=\"nav-item dropdown bg-dark\">
                                        <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">" . $_SESSION["Username"] . "</a>
                                        <div class=\"dropdown-menu bg-dark\">
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"profile.php?user=" . $_SESSION["Username"] . "\">My profile</a>
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"myevents.php\">My events</a>
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"myinterprets.php\">My interprets</a>
                                            <div class=\"dropdown-divider\"></div>
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"profile.php\">Edit profile</a>
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"create_event.php\">Create event</a>
                                            <a class=\"dropdown-item my_dropdownitem\" href=\"add_interpret.php\">Add interpret</a>
                                            <div class=\"dropdown-divider\"></div>";

                                            if(isset($_SESSION["admin"]))
                                            {
                                                echo "
                                                
                                                <a class=\"dropdown-item my_dropdownitem\" href=\"admin.php\">Admin panel</a>
                                                <div class=\"dropdown-divider\"></div>
                                                ";
                                            }


                                            echo "<a class=\"dropdown-item my_dropdownitem\" href=\"php/includes/logout.include.php\">Log out</a>
                                        </div>
                                    </li>
                                </ul>";
                    }
                    else
                    {
                        echo    "<ul class=\"navbar-nav\">
                                    <li class=\"nav-item\">
                                        <a class=\"nav-link\" href=\"login.php\">Log In <span class=\"sr-only\">(current)</span></a>
                                    </li>
                                    <li class=\"nav-item\">
                                        <a class=\"nav-link\" href=\"register.php\">Register <span class=\"sr-only\">(current)</span></a>
                                    </li>
                                </ul>";
                    }
                ?>

                
            </div>
        </nav>
        <!-- NAVBAR END -->