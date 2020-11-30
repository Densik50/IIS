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

                if($event = event_exists_byid($conn, $_GET["id"]))
                {
                    $evetname = $event["Name"];
                    $describtion =  $event["Describtion"];
                    $address =  $event["Address"];
                    $starts = $event["Start_date"]." ".$event["Start_time"];
                    $ends = $event["End_date"]." ".$event["End_time"];
                    $capacity = $event["Capacity"]."/".$event["MaxCapacity"];
                    $price =  $event["Price"];
                    $creatorID = $event["UserID"];
                    $creator = user_exists_byid($conn, $creatorID);
                    $creatorUsername = $creator["Username"];

                    //TODO genres from db

                    echo "
                    <div class=\"card text-center\">
                        <div class=\"card-header\">
                            From $starts to $ends
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$evetname by <a href=\"profile?user=$creatorID\" class=\"\">$creatorUsername</a></h5>
                            <p class=\"card-text\">$describtion</p>
                            <p class=\"card-text\">At $address</p>
                            <p class=\"card-text\">Price: $price (&euro;)</p>
                            <p class=\"card-text\">Capacity: $capacity</p>
                            <div class=\"text-right\">
                        ";
                            $event_id = $_GET["id"];
                            if(isset($_SESSION["UserID"]))
                            {
                                echo "<a href=\"buy_ticket.php?id=$event_id\" class=\"btn btn-primary event-btn\">Buy ticket</a>";
                            }
                            if(($_SESSION["UserID"] == $creatorID) || (isset($_SESSION["admin"])))
                            {
                                echo "<a href=\"manage_event.php?id=$event_id\" class=\"btn btn-primary event-btn\">Manage</a>";
                            }
                            if(($_SESSION["UserID"] == $creatorID) || (is_cashier($conn, $event_id, $_SESSION["UserID"])) || (isset($_SESSION["admin"])))
                            {
                                echo "<a href=\"cashier_panel.php?id=$event_id\" class=\"btn btn-primary event-btn\">Cashier menu</a>";
                            }
                        echo "
                            </div>
                        </div>
                        <div class=\"card-footer text-muted\">
                            Rock, Rap, ...
                        </div>
                    </div>
                    ";
                }
                else
                {
                    echo "<p>Event doesnt exist.</p>";
                }
            }
            else
            {
                echo "<p>Event not found.</p>";
            }
        ?>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>