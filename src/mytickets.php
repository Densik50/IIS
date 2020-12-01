<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <div class="container fullscreen-container wider-container">
        <?php
            if(isset($_SESSION["UserID"]))
            {
                require_once 'php/includes/database_handler.include.php';
                require_once 'php/includes/general_functions.include.php';
                
                if(count($my_tickets = get_tickets_byuid($conn, $_SESSION["UserID"])) > 0)
                {   
                    echo "
                    <table class=\"table table-sm\">
                        <thead>
                            <tr>
                                <th scope=\"col\">ID</th>
                                <th scope=\"col\">Name of event</th>
                                <th scope=\"col\">Address</th>
                                <th scope=\"col\">Starts</th>
                                <th scope=\"col\">Ends</th>
                                <th scope=\"col\">Paied</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    foreach($my_tickets as $ticket):
                        $id = $ticket["TicketID"];
                        $eventid = $ticket["EventID"];
                        $paied = $ticket["Paied"];;
                        
                        $event = event_exists_byid($conn, $eventid);
                        $starts = $event["Start_date"]." ".$event["Start_time"];
                        $ends = $event["End_date"]." ".$event["End_time"];
                        $name = $event["Name"];
                        $address = $event["Address"];

                        if($paied)
                        {
                            $paied_info = "true";
                        }
                        else
                        {
                            $paied_info = "false";
                        }

                        echo "
                            <tr>
                                <th scope=\"row\">$id</th>
                                <td> <a href=\"event.php?id=$id\">$name</a></td>
                                <td>$address</td>
                                <td>$starts</td>
                                <td>$ends</td>
                                <td>$paied_info</td>
                            </tr>
                        ";
                    endforeach;
                    echo "
                        </tbody>
                    </table>
                    
                    ";
                }
                else
                {
                    echo "You haven't bought any tickets yet.";
                }
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