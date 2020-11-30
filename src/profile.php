<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
        <?php
            if(isset($_GET["user"]))
            {
                require_once 'php/includes/database_handler.include.php';
                require_once 'php/includes/general_functions.include.php';

                if($userid_exists = user_exists($conn, $_GET["user"], $_GET["user"]))
                {
                    $username = $userid_exists["Username"];
                    $fullname = $userid_exists["Fullname"];
                    $email = $userid_exists["Email"];
                    $mobile = $userid_exists["Mobile"];
                    $address = $userid_exists["Address"];
                    echo "
                    <table class=\"table table-sm\">
                        <tr>    
                            <th scope=\"col\">Username:</th>
                            <td>$username</td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Full name:</th>
                            <td>$fullname</td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Contact mail:</th>
                            <td>$email</td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Phone number:</th>
                            <td>$mobile</td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Public Address:</th>
                            <td>$address</td>
                        </tr>
                    </table>
                    ";
                    
                    
                    
                    //$userid_exists["Username"];
                }
                else
                {
                    echo "User doesnt exist.";
                }
            }
            else   
            {
                if(isset($_SESSION["UserID"]))
                {
                    $user = $_SESSION["Username"];

                    require_once 'php/includes/database_handler.include.php';
                    require_once 'php/includes/general_functions.include.php';
                    
                    $userid_exists = user_exists($conn, $user, $user);
                }
                else
                {
                    header("location: login.php");
                    exit();
                }
            }
        ?>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>