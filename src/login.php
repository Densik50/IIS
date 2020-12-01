<?php
    include_once 'header.php';
?>
    <?php
    if(isset($_SESSION["UserID"]))
    {
        header("location: php/includes/logout.include.php");
        exit();
    }
    ?>
    <!-- SITE START -->
    <div class="container fullscreen-container">
        <h2>Log In</h2>
        <form class="login-form " action="php/includes/login.include.php" method="post">

            <!-- USERNAME -->
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Username/Email:</label>
                <div class="col-sm-10">
                    <input type="text" name="userid" class="form-control" id="colFormLabel" placeholder="Username/Email...">
                </div>
            </div>
            <!-- USERNAME END -->

            <!-- PASSWORD -->
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="pwd" class="form-control" id="inputPassword3" placeholder="Password...">
                </div>
            </div>
            <!-- PASSWORD END -->

            <!-- SUBMIT BUTTON -->
            <button type="submit" name="submit" class="btn btn-primary">Log In</button>
            <!-- SUBMIT BUTTON END -->
        </form>

        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "empty_input")
                {
                    echo "
                    <div class=\"alert alert-danger\" style=\"margin-top: 15px;\" role=\"alert\">
                        You forgot to input all needed information :( Try again...
                    </div>
                    ";
                }
                else if($_GET["error"] == "wrong_login")
                {
                    echo "
                    <div class=\"alert alert-danger\" style=\"margin-top: 15px;\" role=\"alert\">
                        Wrong login credentials :( Try again...
                    </div>
                    ";
                }
                else if($_GET["error"] == "you_are_banned")
                {
                    echo "
                    <div class=\"alert alert-danger\" style=\"margin-top: 15px;\" role=\"alert\">
                        You are banned :( Go away!
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