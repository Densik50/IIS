<?php
    include_once 'header.php';
?>

    <!-- SITE START -->
    <div class="container register-container">
        <h2>Register</h2>
        <form class="register-form" action="php/includes/register.include.php" method="post">
            <!-- FULL NAME -->
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Full name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="colFormLabel" placeholder="Full name...">
                </div>
            </div>
            <!-- FULL NAME END -->

            <!-- USERNAME -->
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" name="userid" class="form-control" id="colFormLabel" placeholder="Username...">
                </div>
            </div>
            <!-- USERNAME END -->

            <!-- EMAIL -->
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="colFormLabel" placeholder="example@email.com">
                </div>
            </div>
            <!-- EMAIL END -->

            <!-- PASSWORD -->
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="pwd" class="form-control" id="inputPassword3" placeholder="Password...">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
            <!-- PASSWORD END -->

            <!-- PASSWORD REPEAT -->
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Repeat password:</label>
                <div class="col-sm-10">
                    <input type="password" name="pwdrepeat" class="form-control" id="inputPassword3" placeholder="Repeat password...">
                </div>
            </div>
            <!-- PASSWORD REPEAT END -->

            <!-- SUBMIT BUTTON -->
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            <!-- SUBMIT BUTTON END -->
        </form>

        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "empty_input")
                {
                    echo "<p> Example error 1.<\p>";
                }
            }
        ?>

    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>