<?php
    include_once 'header.php';
?>
    <!-- SITE START -->
    <div class="container fullscreen-container" id="editcon">
    <script>
        $(document).ready(function(){
            $('#table_edit button').click(function(){
            $('#editcon').load($(this).attr("id"), function() {
                $('#editcon').fadeIn('slow') ;
                });
            return false;
            });
        })
    </script>
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
                    $username = $userid_exists["Username"];
                    $fullname = $userid_exists["Fullname"];
                    $email = $userid_exists["Email"];
                    $mobile = $userid_exists["Mobile"];
                    $address = $userid_exists["Address"];
                    $password = $userid_exists["Password"];
                    echo "
                    <table class=\"table table-sm\" id=\"table_edit\">
                        <tr>    
                            <th scope=\"col\">Username:</th>
                            <td>$username</td>
                            <td><button type=\"submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=username\">
                                <a href=\"edit_profile.php?info=username\">Edit Username</a>
                            </button></td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Full name:</th>
                            <td>$fullname</td>
                            <td><button type=\submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=fullname\">
                                <a href='edit_profile.php?info=fullname'>Edit Fullname</a>
                            </button></td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Contact mail:</th>
                            <td>$email</td>
                            <td><button type=\submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=email\">
                                <a href='edit_profile.php?info=email'>Edit Email</a>
                            </button></td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Phone number:</th>
                            <td>$mobile</td>
                            <td><button type=\submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=mobile\">
                                <a href='edit_profile.php?info=mobile'>Edit Mobile</a>
                            </button></td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Public Address:</th>
                            <td>$address</td>
                            <td><button type=\submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=address\">
                                <a href='edit_profile.php?info=address'>Edit Address</a>
                            </button></td>
                        </tr>
                        <tr>    
                            <th scope=\"col\">Password:</th>
                            <td>$password</td>
                            <td><button type=\submit\" class=\"btn btn-secondary abtn\" id=\"edit_profile.php?info=password\">
                                <a href='edit_profile.php?info=password'>Edit Password</a>
                            </button></td>
                        </tr>
                    </table>
                    ";

                }
                else
                {
                    header("location: login.php");
                    exit();//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                }
            }
        ?>
    </div>
    <!-- SITE END -->



<?php
    include_once 'footer.php';
?>