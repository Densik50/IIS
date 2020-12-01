<?php

if(isset($_POST["submit"]))
{
    require_once "database_handler.include.php";
    require_once "general_functions.include.php";
    $eventid = $_POST["eventid"];
    $userid = $_POST["userid"];
    $amount = $_POST["amount"];
    for ($i=0; $i < $amount; $i++)
    { 
        make_reservation($conn, $eventid, $userid);
    }
    header("location: ../../buy_ticket.php?id=$eventid&error=none");
    exit();
}
else
{
    header("location: ../../events.php");
    exit();
}