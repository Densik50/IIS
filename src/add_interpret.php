<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
    <?php
            if(isset($_SESSION["UserID"]))
            {

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