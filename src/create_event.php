<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
    <?php
            if(isset($_SESSION["UserID"]))
            {
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

                        <!-- DESCRIBTION -->
                        <div class=\"form-group row\">
                            <label for=\"describtion\" class=\"col-sm-2 col-form-label\">Describtion: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"describtion\" class=\"form-control\" id=\"describtion\" placeholder=\"Describtion(max 255 characters)...\">
                            </div>
                        </div>
                        <!-- DESCRIBTION END -->  

                        <!-- ADDRESS -->
                        <div class=\"form-group row\">
                            <label for=\"address\" class=\"col-sm-2 col-form-label\">Address: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"address\" class=\"form-control\" id=\"address\" placeholder=\"Address\">
                            </div>
                        </div>
                        <!-- ADDRESS END --> 

                        <!-- START DATE -->
                        <div class=\"form-group row\">
                            <label for=\"startdate\" class=\"col-sm-2 col-form-label\">Start date: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"startdate\" id=\"startdate\" placeholder=\"DD.MM.YYYY\">
                            </div>
                        </div>
                        <!-- START DATE END -->

                        <!-- START TIME -->
                        <div class=\"form-group row\">
                            <label for=\"starttime\" class=\"col-sm-2 col-form-label\">Start time(12H format): </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"starttime\" id=\"starttime\" placeholder=\"HH:MM\">
                            </div>
                        </div>
                        <!-- START TIME END -->

                        <!-- END DATE -->
                        <div class=\"form-group row\">
                            <label for=\"enddate\" class=\"col-sm-2 col-form-label\">End date: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"enddate\" id=\"enddate\" placeholder=\"DD.MM.YYYY\">
                            </div>
                        </div>
                        <!-- END DATE END -->

                        <!-- END TIME -->
                        <div class=\"form-group row\">
                            <label for=\"endtime\" class=\"col-sm-2 col-form-label\">End time(12H format): </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"endtime\" id=\"endtime\" placeholder=\"HH:MM\">
                            </div>
                        </div>
                        <!-- END TIME END -->

                        <!-- POSTER -->
                        <div class=\"form-group row\">
                            <label class=\"col-sm-2 col-form-label\" for=\"poster\">Poster: </label>
                            <input type=\"file\" class=\"form-control-file col-sm-10\" id=\"poster\" name=\"poster\">
                        </div>
                        <!-- POSTER END -->
                
                        <!-- GENRES -->
                        <div class=\"form-group row\">
                            <div class=\"col-sm-2\">Genres:</div>
                            <div class=\"col-sm-10\">
                            ";


                                require_once 'php/includes/database_handler.include.php';
                                require_once 'php/includes/general_functions.include.php';

                                $data = get_genres($conn);

                                foreach($data as $row):
                                    echo "
                                        <div class=\"form-check\">
                                            <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox_" . $row["GenreName"] ."\" name=\"checkbox_" . $row["GenreName"] ."\">
                                            <label class=\"form-check-label\" for=\"checkbox_" . $row["GenreName"] ."\">
                                            " . $row["GenreName"] ."
                                            </label>
                                        </div>
                                    ";
                                endforeach;
                                echo "
                            </div>
                        </div>
                        <!-- GENRES END -->
                        
                        <!-- MAX CAPACITY -->
                        <div class=\"form-group row\">
                            <label for=\"maxcap\" class=\"col-sm-2 col-form-label\">Max. capacity: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"number\" name=\"maxcap\" class=\"form-control\" id=\"maxcap\" placeholder=\"150\" min=\"5\">
                            </div>
                        </div>
                        <!-- MAX CAPACITY END --> 

                        <!-- PRICE -->
                        <div class=\"form-group row\">
                            <label for=\"price\" class=\"col-sm-2 col-form-label\">Entry price(EUR): </label>
                            <div class=\"col-sm-10\">
                                <input type=\"number\" name=\"price\" class=\"form-control\" id=\"price\" placeholder=\"5\" min=\"1\">
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