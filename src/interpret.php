<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container">
        <?php
            if(isset($_GET["id"]))
            {
                require_once 'php/includes/database_handler.include.php';
                require_once 'php/includes/general_functions.include.php';

                if($interpret = interpret_exists_byid($conn, $_GET["id"]))
                {
                    $interpretname = $interpret["Name"];
                    $creatorID = $interpret["Owner"];
                    $creator = user_exists_byid($conn, $creatorID);
                    $creatorUsername = $creator["Username"];
                    //TODO membres from DB
                    $members = "Members : ..."; 
                    $describtion = $interpret["Describtion"];

                    $all_genres = get_allinterprets_genres($conn, $_GET["id"]);
                    $genres = "";
                    foreach($all_genres as $genreid):
                        $genre = get_genre_byid($conn, $genreid["GenreID"]);
                        $genres = $genres . " " . $genre["GenreName"];
                    endforeach;

                    echo "
                    <div class=\"card text-center\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$interpretname by <a href=\"profile.php?user=$creatorUsername\" class=\"\">$creatorUsername</a></h5>
                            <p class=\"card-text\">$describtion</p>
                            <div class=\"text-right\">
                        ";
                            $interpret_id = $_GET["id"];
                            if(($_SESSION["UserID"] == $creatorID) || (isset($_SESSION["admin"])))
                            {
                                echo "<a href=\"manage_interpret.php?id=$interpret_id\" class=\"btn btn-primary event-btn\">Manage</a>";
                            }
                        echo "
                            </div>
                        </div>
                        <div class=\"card-footer text-muted\">
                        $genres
                        </div>
                    </div>
                    ";
                }
                else
                {
                    echo "<p>Interpret doesnt exist.</p>";
                }
            }
            else
            {
                echo "<p>Interpret not found.</p>";
            }
        ?>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>