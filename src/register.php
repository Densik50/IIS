<?php
    include_once 'header.php';
?>
    <?php
        if(isset($_SESSION["UserID"]))
        {
            header("location: php/includes/logout.include.php");
            exit();
        }

        if(isset($_GET["name"]))
        {   
            $name = $_GET["name"];
        }
        else
        {
            $name = "";
        }

        if(isset($_GET["userid"]))
        {   
            $userid = $_GET["userid"];
        }
        else
        {
            $userid = "";
        }

        if(isset($_GET["email"]))
        {   
            $email = $_GET["email"];
        }
        else
        {
            $email = "";
        }

        if(isset($_GET["mobile"]))
        {   
            $mobile = $_GET["mobile"];
        }
        else
        {
            $mobile = "";
        }

        if(isset($_GET["address"]))
        {   
            $address = $_GET["address"];
        }
        else
        {
            $address = "";
        }
    ?>
    <!-- SITE START -->
    <div class="container fullscreen-container">
        <h2>Register</h2>
        <form class="register-form" action="php/includes/register.include.php" method="post">
            <!-- FULL NAME -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name*:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Full name..." <?php echo"value=\"$name\"";?>>
                </div>
            </div>
            <!-- FULL NAME END -->

            <!-- USERNAME -->
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username*:</label>
                <div class="col-sm-10">
                    <input type="text" name="userid" class="form-control" id="username" placeholder="Username..." <?php echo"value=\"$userid\"";?>>
                </div>
            </div>
            <!-- USERNAME END -->

            <!-- EMAIL -->
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email*:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" <?php echo"value=\"$email\"";?>>
                </div>
            </div>
            <!-- EMAIL END -->

            <!-- PASSWORD -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password*:</label>
                <div class="col-sm-10">
                    <input type="password" name="pwd" class="form-control" id="inputPassword" placeholder="Password...">
                </div>
            </div>
            <!-- PASSWORD END -->

            <!-- PASSWORD REPEAT -->
            <div class="form-group row">
                <label for="inputPasswordRe" class="col-sm-2 col-form-label">Repeat password*:</label>
                <div class="col-sm-10">
                    <input type="password" name="pwdrepeat" class="form-control" id="inputPasswordRe" placeholder="Repeat password...">
                </div>
            </div>
            <!-- PASSWORD REPEAT END -->

            <!-- PHONE NUMBER -->
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Phone number:</label>
                <div class="col-sm-10">
                    <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="421XXXXXXXXX" <?php echo"value=\"$mobile\"";?>>
                </div>
            </div>
            <!-- PHONE NUMBER END -->

            <!-- ADDRESS -->
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address..." <?php echo"value=\"$address\"";?>>
                </div>
            </div>
            <!-- ADDRESS END -->

            <!-- SUBMIT BUTTON -->
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            <!-- SUBMIT BUTTON END -->
        </form>

        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "empty_input")
                {
                    echo "
                    <div class=\"alert alert-danger\" style=\"margin-top: 15px;\" role=\"alert\">
                        Please fill out all inputs marked with *.
                    </div>
                    ";
                }
            }
        ?>

    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>