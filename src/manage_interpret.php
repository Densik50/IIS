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
                    echo "<p>Interpret not found.</p>";
                }
                else
                {
                    //write out manage panel for interpret
                    if(is_owner_interpret($conn, $_GET["id"], $_SESSION["UserID"]) || isset($_SESSION["admin"]))
                    {
                        $interpret = interpret_exists_byid($conn, $_GET["id"]);
                        $interpret_id = $_GET["id"];
                        $interpret_name = $interpret["Name"];
                        $describtion = $interpret["Describtion"];
                        echo "
                        <table class=\"table table-sm\">
                            <tr>    
                                <th scope=\"col\">Interpret name:</th>
                                <td>$interpret_name</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary\" id=\"Name\">
                                        <a class=\"text-white\" href=\"edit_interpret.php?info=Name&interpret_id=$interpret_id\">Edit</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>    
                                <th scope=\"col\">Describtion:</th>
                                <td>$describtion</td>
                                <td>
                                    <button type=\"submit\" class=\"btn btn-primary abtn\" id=\"Describtion\">
                                        <a class=\"text-white\" href=\"edit_interpret.php?info=Describtion&interpret_id=$interpret_id\">Edit</a>
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