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
                
                $userid_exists = get_info($conn, $user, $user);

                //meno
                echo 
                    "<h2>Create new event:</h2>
                    <form class=\"register-form\" action=\"php/includes/create_event.include.php\" method=\"post\">

                        <!-- NAME -->
                        <div class=\"form-group row\">
                            <label for=\"name\" class=\"col-sm-2 col-form-label\">Name: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Name\">
                            </div>
                        </div>
                        <!-- NAME END -->  

                        <!-- ADDRESS -->
                        <div class=\"form-group row\">
                            <label for=\"address\" class=\"col-sm-2 col-form-label\">Address: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"address\" class=\"form-control\" id=\"address\" placeholder=\"Address\">
                            </div>
                        </div>
                        <!-- ADDRESS END --> 

                        <!-- DATE -->
                        <div class=\"form-group row\">
                            <label for=\"date\" class=\"col-sm-2 col-form-label\">Date: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"date\" name=\"date\" id=\"date\">
                            </div>
                        </div>
                        <!-- DATE END -->

                        <!-- POSTER -->
                        <div class=\"form-group row\">
                            <label class=\"col-sm-2 col-form-label\" for=\"poster\">Poster: </label>
                            <input type=\"file\" class=\"form-control-file col-sm-10\" id=\"poster\" name=\"poster\">
                        </div>
                        <!-- POSTER END -->
                
                        <!-- GENRES -->
                        <div class=\"form-group row\">
                            <div class=\"col-sm-2\">Genres(atleast 1):</div>
                            <div class=\"col-sm-10\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_rock\" name=\"checkbox_rock\">
                                    <label class=\"form-check-label\" for=\"checkbox_rock\">
                                    Rock
                                    </label>
                                </div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_rap\" name=\"checkbox_rap\">
                                    <label class=\"form-check-label\" for=\"checkbox_rap\">
                                    Rap
                                    </label>
                                </div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_pop\" name=\"checkbox_pop\">
                                    <label class=\"form-check-label\" for=\"checkbox_pop\">
                                    Pop
                                    </label>
                                </div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_metal\" name=\"checkbox_metal\">
                                    <label class=\"form-check-label\" for=\"checkbox_metal\">
                                    Metal
                                    </label>
                                </div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_dance\" name=\"checkbox_dance\">
                                    <label class=\"form-check-label\" for=\"checkbox_dance\">
                                    Dance
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- GENRES END -->

                        <!-- PRICE -->
                        <div class=\"form-group row\">
                            <label for=\"price\" class=\"col-sm-2 col-form-label\">Entry price(EUR): </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"price\" class=\"form-control\" id=\"price\" placeholder=\"5\">
                            </div>
                        </div>
                        <!-- PRICE END --> 

                        <!-- SUBMIT BUTTON -->
                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Create</button>
                        <!-- SUBMIT BUTTON END -->
                    </form>
                    ";
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