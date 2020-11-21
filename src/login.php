<?php
    include_once 'header.php';
?>

    <!-- SITE START -->
    <div class="container register-container">
        <h2>Log In</h2>
        <form class="login-form" action="php/includes/login.include.php" method="post">

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
            <button type="submit" class="btn btn-primary">Log In</button>
            <!-- SUBMIT BUTTON END -->
        </form>


    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>