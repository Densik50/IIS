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
                
                if(count($my_events = get_my_events($conn, $_SESSION["UserID"])) > 0)
                {   
                    echo "
                    <table class=\"table table-sm\">
                        <thead>
                            <tr>
                                <th scope=\"col\">ID</th>
                                <th scope=\"col\">Name</th>
                                <th scope=\"col\">Starts</th>
                                <th scope=\"col\">Ends</th>
                                <th scope=\"col\">Capacity</th>
                                <th scope=\"col\">Reservations</th>
                                <th scope=\"col\">Price</th>
                                <th scope=\"col\"></th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    foreach($my_events as $event):
                        $id = $event["EventID"];
                        $name = $event["Name"];
                        $starts = $event["Start_date"]." ".$event["Start_time"];
                        $ends = $event["End_date"]." ".$event["End_time"];
                        $capacity = $event["Capacity"]."/".$event["MaxCapacity"];
                        $reservations = $event["MaxCapacity"] - $event["Capacity"];
                        $reserved = $event["Reserved"]."/".$reservations;
                        $price = $event["Price"];

                        echo "
                            <tr>
                                <th scope=\"row\">$id</th>
                                <td> <a href=\"event.php?=$id\">$name</a></td>
                                <td>$starts</td>
                                <td>$ends</td>
                                <td>$capacity</td>
                                <td>$reserved</td>
                                <td>$price (&euro;)</td>
                                <td><a class=\"\" href=\"manage_event.php?=$id\" role=\"button\">Manage</a></td>
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
                    echo "You haven't created any events yet.";
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