<?php
    include_once 'header.php';
    include_once 'php/includes/database_handler.include.php';
?>

<style>
.child_div {
 height: 100px;
 width: 200px;
 overflow: hidden;
 position: relative;
 display: inline-block;
    float:bottom;
 }
    </style>

<div class="child-div">

<?php

    $info = $_GET['info'];
    $evid = $_GET['event_id'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($info == "Name")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"ename\">Event name</label><br>
        <input type=\"text\" id=\"ename\" name=\"Name\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Describtion")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"desc\">Event description</label><br>
        <input type=\"text\" id=\"desc\" name=\"description\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Address")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"addr\">Event Address</label><br>
        <input type=\"text\" id=\"addr\" name=\"Address\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Start_date")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"sd\">Event start date</label><br>
        <input type=\"text\" id=\"sd\" name=\"Start_date\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Start_time")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"st\">Event start time</label><br>
        <input type=\"text\" id=\"st\" name=\"Start_time\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "End_date")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"ed\">Event end date</label><br>
        <input type=\"text\" id=\"ed\" name=\"End_date\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "End_time")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"et\">Event end time</label><br>
        <input type=\"text\" id=\"et\" name=\"End_time\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "Price")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"price\">Event price</label><br>
        <input type=\"text\" id=\"price\" name=\"Price\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "MaxCapacity")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"mc\">Maximum capacity</label><br>
        <input type=\"text\" id=\"mc\" name=\"MaxCapacity\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "addinterpret")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"ai\">interpret (id)</label><br>
        <input type=\"text\" id=\"ai\" name=\"addinterpret\"><br>
        <label for=\"ai\">Stage</label><br>
        <input type=\"text\" id=\"ai\" name=\"addstage\"><br>
        <label for=\"ai\">Start_time</label><br>
        <input type=\"text\" id=\"ai\" name=\"addstarttime\"><br>
        <label for=\"ai\">Start_date</label><br>
        <input type=\"text\" id=\"ai\" name=\"addstartdate\"><br>
        <label for=\"ai\">End_time</label><br>
        <input type=\"text\" id=\"ai\" name=\"addendtime\"><br>
        <label for=\"ai\">End_date</label><br>
        <input type=\"text\" id=\"ai\" name=\"addenddate\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "deleteinterpret")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"di\">Delete interpret (id)</label><br>
        <input type=\"text\" id=\"di\" name=\"deleteinterpret\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "addcashier")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"ac\">Cashier name</label><br>
        <input type=\"text\" id=\"ac\" name=\"addcashier\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }
    elseif($info == "deletecashier")
    {
        echo "
        <form method=\"POST\" action=\"\" accept-charset=\"utf-8\">
        <label for=\"dc\">Delete cashier</label><br>
        <input type=\"text\" id=\"dc\" name=\"deletecashier\"><br>
        <input class=\"btn btn-primary btn-dark\" type=\"submit\" value=\"Submit\">
        </form>

        ";
    }





    $user = $_SESSION["Username"];
        require_once 'php/includes/database_handler.include.php';
        require_once 'php/includes/general_functions.include.php';





    if(isset($_POST['Name']) && !empty($_POST['Name']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Name = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Name']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Description Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['Description']) && !empty($_POST['Description']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Describtion = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Description']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Description Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['Address']) && !empty($_POST['Address']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Address = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Address']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Address Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['Start_date']) && !empty($_POST['Start_date']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Start_date = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Start_date']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Start_date Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['Start_time']) && !empty($_POST['Start_time']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Start_time = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Start_time']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Start_time Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['End_date']) && !empty($_POST['End_date']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET End_date = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['End_date']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "End_date Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['End_time']) && !empty($_POST['End_time']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET End_time = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['End_time']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "End_time Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['Price']) && !empty($_POST['Price']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET Price = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['Price']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Price Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['MaxCapacity']) && !empty($_POST['MaxCapacity']))
    {
        $eventid_exists = event_exists_byid($conn, $evid);
        $idd = $eventid_exists["EventID"];
        if ($stmt = mysqli_prepare($conn, "UPDATE EVENTS SET MaxCapacity = ? WHERE EventID = $idd")) 
        {
            mysqli_stmt_bind_param($stmt, "s", $_POST['MaxCapacity']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "MaxCapacity Changed!";
            //$_SESSION['Fullname'] = $_POST['Fullname'];
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['addinterpret']) && !empty($_POST['addinterpret']) && !empty($_POST['addstage']) && !empty($_POST['addstarttime']) && !empty($_POST['addstartdate']) && !empty($_POST['addendtime']) && !empty($_POST['addenddate']))
    {
        $intid_exists = interpret_exists($conn, $_POST['addinterpret']);
        $idd = $intid_exists["InterpretID"];
        if ($stmt = mysqli_prepare($conn, "INSERT INTO event_interprets (EventID, InterpretID, Stage_name, Start_time, Start_date, End_time, End_date) VALUES ($evid, ?,?,?,?,?,?)")) 
        {
            mysqli_stmt_bind_param($stmt, "isssss", $_POST['addinterpret'], $_POST['addstage'], $_POST['addstarttime'], $_POST['addstartdate'], $_POST['addendtime'], $_POST['addenddate']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Interpret added!";
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['deleteinterpret']) && !empty($_POST['deleteinterpret']))
    {
        $intid_exists = interpret_exists($conn, $evid);
        $idd = $intid_exists["InterpretID"];
        if ($stmt = mysqli_prepare($conn, "DELETE FROM EVENT_INTERPRETS WHERE InterpretID = $idd;")) 
        {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Interpret deleted!";
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['addcashier']) && !empty($_POST['addcashier']))
    {
        $userid_exists = user_exists($conn, $_POST['addcashier'], $_POST['addcashier']);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "INSERT INTO EVENT_CASHIERS (EventID, UserID) VALUES ($evid, $idd);")) 
        {
            //mysqli_stmt_bind_param($stmt, "i", $_POST['addcashier']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Cashier added!";
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
    elseif(isset($_POST['deletecashier']) && !empty($_POST['deletecashier']))
    {
        $userid_exists = user_exists($conn, $_POST['addcashier'], $_POST['addcashier']);
        $idd = $userid_exists["UserID"];
        if ($stmt = mysqli_prepare($conn, "DELETE FROM EVENT_CASHIERS WHERE UserID = $idd")) 
        {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Cashier deleted!";
        } 
        else 
        {
            printf("MySQL Error: %s\n", mysqli_error($conn));
        }
    }
   
?>

</div>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
    
</html>