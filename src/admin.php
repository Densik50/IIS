<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
    <?php
            if(isset($_SESSION["userid"]))
            {
                $user_data = get_info($_SESSION["userid"]);
                if($user_data["admin"] === false)
                {
                    echo "Restricted access!";
                }
                else
                {
                    
                }
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