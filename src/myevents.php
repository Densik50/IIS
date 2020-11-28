<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
    <?php
            if(isset($_SESSION["userid"]))
            {
                $user = $_SESSION["userid"];

                require_once 'php/includes/database_handler.include.php';
                require_once 'php/includes/general_functions.include.php';
                
                $userid_exists = user_exists($conn, $user, $user);

                //TODO pridat vypis informacii, nepridane lebo tie other informations este nie su v databazy
                //meno
                echo "<h2>" . $userid_exists["Username"] . "'s events:</h2>";

                //popis - nejaky <p>

                //email

            }
            else
            {
                header("location: login.php");
                exit();
            }
        ?>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>