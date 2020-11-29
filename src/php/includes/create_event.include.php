<?php

//checks if user got here by pressing button
if(isset($_POST["submit"]))
{
    require_once 'database_handler.include.php';
    require_once 'general_functions.include.php';
    $name = $_POST["name"];
    $describtion = $_POST["describtion"];
    $address = $_POST["address"];
    $startdate = $_POST["startdate"];
    $starttime = $_POST["starttime"];
    $enddate = $_POST["endtime"];
    $endtime = $_POST["endtime"];
    $poster = $_POST["poster"];
    $maxcap = $_POST["maxcap"];
    $price = $_POST["price"];
    //name describtion address startdate starttime enddate endtime poster maxcap price

    //check errors in input forms
    if(empty($name) || empty($describtion) || empty($address) || empty($startdate) || empty($starttime) ||
    empty($enddate) || empty($endtime) || empty($maxcap) || empty($price))
    {
        header("location: ../../create_event.php?error=empty_input");
        exit();
    }

    if(event_exists($conn, $name) === true)
    {
        header("location: ../../create_event.php?error=event_already_exists");
        exit();
    }
    session_start();
    $eventresult = create_event($conn, $name, $describtion, $address, $startdate, $starttime, $enddate, $endtime, $price, $maxcap, $_SESSION["Username"]);
    
    $data = get_genres($conn);
    foreach($data as $row):
        if(isset($_POST["checkbox_".$row["GenreName"]]))
        {
            $checkbox_result = $_POST["checkbox_".$row["GenreName"]];
            if($checkbox_result == 'Yes')
            {
                create_eventgenre($conn, $eventid["EventID"], $row["GenreID"]);
            }
        }
    endforeach;

    header("location: ../../create_event.php?error=none");
    exit();
}
else
{
    header("location: ../../register.php");
    exit();
}