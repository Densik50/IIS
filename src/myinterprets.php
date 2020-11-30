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
                
                if(count($my_interprets= get_my_interprets($conn, $_SESSION["UserID"])) > 0)
                {   
                    echo "
                    <table class=\"table table-sm\">
                        <thead>
                            <tr>
                                <th scope=\"col\">ID</th>
                                <th scope=\"col\">Name</th>
                                <th scope=\"col\"></th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    foreach($my_interprets as $event):
                        $id = $event["InterpretID"];
                        $name = $event["Name"];

                        echo "
                            <tr>
                                <th scope=\"row\">$id</th>
                                <td> <a href=\"interpret.php?id=$id\">$name</a></td>
                                <td><a class=\"\" href=\"manage_interpret.php?id=$id\" role=\"button\">Manage</a></td>
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
                    echo "You haven't created any interprets yet.";
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