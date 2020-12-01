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
                
                if(!isset($_GET["id"]))
                {
                    //write out events for which i am cashier
                    if(count($all_events = events_bycashierid($conn, $_SESSION["UserID"])) > 0)
                    {
                        echo "
                        <table class=\"table table-sm\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">EventID</th>
                                    <th scope=\"col\">EventName</th>
                                    <th scope=\"col\">Unsolved Reservations</th>
                                    <th scope=\"col\"></th>
                                </tr>
                            </thead>
                            <tbody>
                        ";
                        foreach($all_events as $eventtmp):
                            $event = event_exists_byid($conn, $eventtmp["EventID"]);
                            $id = $event["EventID"];
                            $eventname = $event["Name"];
                            $reservations = $event["Reserved"];

                            echo "
                                <tr>
                                    <th scope=\"row\">$id</th>
                                    <td>$eventname</td>
                                    <td>$reservations</td>
                                    <td> <a href=\"cashier_panel.php?id=$id\">Cashier menu</a></td>
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
                        echo "<p>You are not cashier for any events.</p>";
                    }
                }
                else
                {
                    //write out cashier panel for concrete event
                    if(is_cashier($conn, $_GET["id"], $_SESSION["UserID"]) || is_owner($conn, $_GET["id"], $_SESSION["UserID"]))
                    {
                        if(count($all_tickets = get_tickets_byeid($conn, $_GET["id"])) > 0)
                        {
                            echo "
                            <h2>Tickets for event_id:  ". $_GET["id"]."</h2>
                            <table class=\"table table-sm\">
                                <thead>
                                    <tr>
                                        <th scope=\"col\">TicketID</th>
                                        <th scope=\"col\">UserID</th>
                                        <th scope=\"col\">Username</th>
                                        <th scope=\"col\">Paied</th>
                                        <th scope=\"col\"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            ";
                            foreach($all_tickets as $ticket):
                                $id = $ticket["TicketID"];
                                $eventid = $ticket["EventID"];
                                $userid = $ticket["Buyer"];
                                $paied = $ticket["Paied"];;
                                $user = user_exists_byid($conn, $userid);
                                $username = $user["Username"];

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
                                        <td>$userid</td>
                                        <td> <a href=\"profile.php?user=$username\">$username</a></td>
                                        <td>$paied_info</td>";

                                    if(!$paied)
                                        echo"
                                        <td>
                                        <form class=\"register-form\" action=\"php/includes/make_ticket_paied.include.php\" method=\"post\">
                                            <input type=\"hidden\" id=\"ticket_id\" name=\"ticket_id\" value=\"$id\">
                                            <input type=\"hidden\" id=\"eventid\" name=\"eventid\" value=\"$eventid\">
                                            <!-- SUBMIT BUTTON -->
                                            <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Set as paied</button>
                                            <!-- SUBMIT BUTTON END -->
                                        </form>
                                        </td>";
                            echo    "
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
                            echo "<p>No tickets were reserved/bought so far.</p>";
                        }
                    }
                    else
                    {
                        echo "<p>Access restricted!</p>";
                    }
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