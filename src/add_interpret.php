<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
    <?php
            if(isset($_SESSION["UserID"]))
            {
                echo 
                    "<h2>Add new interpret:</h2>
                    <form class=\"register-form\" action=\"php/includes/add_interpret.include.php\" method=\"post\">

                        <!-- NAME -->
                        <div class=\"form-group row\">
                            <label for=\"name\" class=\"col-sm-2 col-form-label\">Name: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Name\">
                            </div>
                        </div>
                        <!-- NAME END -->  

                        <!-- describtion -->
                        <div class=\"form-group row\">
                            <label for=\"describtion\" class=\"col-sm-2 col-form-label\">Describtion: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"describtion\" class=\"form-control\" id=\"describtion\" placeholder=\"Describtion\">
                            </div>
                        </div>
                        <!-- describtion END -->  

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