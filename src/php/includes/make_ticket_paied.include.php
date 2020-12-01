<?php

if(isset($_POST["submit"]))
{
    require_once "database_handler.include.php";
    require_once "general_functions.include.php";
    $event_id = $_POST["eventid"];
    $ticket_id = $_POST["ticket_id"];

    set_aspaied($conn, $ticket_id, $event_id);

    header("location: ../../cashier_panel.php?id=$event_id");
    exit();
}
else
{
    header("location: ../../cashier_panel.php");
    exit();
}