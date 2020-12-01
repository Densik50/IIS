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
                    $eventid = $_GET["id"];
                    $userid = $_SESSION["UserID"];
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
                    /* $reservations = $event["MaxCapacity"] - $event["Capacity"];
                    $reserved = $event["Reserved"]."/".$reservations; */
                    $stock = $event["MaxCapacity"] - $event["Reserved"];

                    //TODO genres from db
                    if(($event["MaxCapacity"] - $event["Reserved"]) > 0)
                    {
                        echo "
                    <h2>Buy tickets for:</h2>
                    <form class=\"register-form\" action=\"php/includes/buy_ticket.include.php\" method=\"post\">
                    <input type=\"hidden\" id=\"eventid\" name=\"eventid\" value=\"$eventid\">
                    <input type=\"hidden\" id=\"userid\" name=\"userid\" value=\"$userid\">
                        <table class=\"table table-sm\" id=\"table_edit\">
                            <tr>    
                                <th scope=\"col\">Ticket for:</th>
                                <td>$evetname by $creatorUsername</td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Address:</th>
                                <td>$address</td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Starts:</th>
                                <td>$starts</td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Ends:</th>
                                <td>$ends</td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Price for 1 ticket:</th>
                                <td>$price &euro;</td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Stock:</th>
                                <td>$stock</td>
                            </tr>
                        </table>

                        <!-- Tickets amount -->
                        <div class=\"form-group row\">
                            <label for=\"amount\" class=\"col-sm-2 col-form-label\">Amount: </label>
                            <div class=\"col-sm-10\">
                                <input type=\"number\" name=\"amount\" class=\"form-control\" id=\"amount\" placeholder=\"1\" value=\"1\" min=\"1\" max=\"$stock\">
                            </div>
                        </div>
                        <!-- Tickets amount END --> 

                        <!-- SUBMIT BUTTON -->
                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Buy</button>
                        <!-- SUBMIT BUTTON END -->
                    </form>
                        ";
                    }
                    else
                    {
                        if($event["Capacity"] == $event["MaxCapacity"])
                        {
                            echo "<p>We are sorry! All entries have been sold out.</p>";
                        }
                        else
                        {
                            echo "<p>We are sorry! All entries are reserved, check out later.</p>";
                        }
                    }
                    
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