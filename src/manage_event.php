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
                    echo "<p>Event not found.</p>";
                }
                else
                {
                    //write out manage panel for event
                    if(is_owner($conn, $_GET["id"], $_SESSION["UserID"]) || isset($_SESSION["admin"]))
                    {
                        $event = event_exists_byid($conn, $_GET["id"]);
                        $event_id = $_GET["id"];
                        $eventname = $event["Name"];
                        $describtion = $event["Describtion"];
                        $Address = $event["Address"];
                        $Start_date = $event["Start_date"];
                        $Start_time = $event["Start_time"];
                        $End_date = $event["End_date"];
                        $End_time = $event["End_time"];
                        $Price = $event["Price"];
                        $MaxCapacity = $event["MaxCapacity"];
                        echo "
                        <table class=\"table table-sm\">
                            <tr>    
                                <th scope=\"col\">Event name:</th>
                                <td>$eventname</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary\" id=\"Name\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Name&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Describtion:</th>
                                <td>$describtion</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Describtion\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Describtion&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Address:</th>
                                <td>$Address</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Address\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Address&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Start_date:</th>
                                <td>$Start_date</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Start_date\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Start_date&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Start_time:</th>
                                <td>$Start_time</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Start_time\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Start_time&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">End_date:</th>
                                <td>$End_date</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"End_date\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=End_date&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">End_time:</th>
                                <td>$End_time</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"End_time\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=End_time&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Price:</th>
                                <td>$Price</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Price\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=Price&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">MaxCapacity:</th>
                                <td>$MaxCapacity</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"MaxCapacity\">
                                        <a class=\"text-white\" href=\"edit_event.php?info=MaxCapacity&event_id=$event_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                        </table>
                        ";
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