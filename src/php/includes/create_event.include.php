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
    $enddate = $_POST["enddate"];
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
        header("location: ../../create_event.php?error=already_exists");
        exit();
    }
    session_start();
    create_event($conn, $name, $describtion, $address, $startdate, $starttime, $enddate, $endtime, $price, $maxcap, $_SESSION["UserID"]);
    $data = get_genres($conn);
    $checkboxdata = array();
    foreach($data as $row):
        if(isset($_POST["checkbox_".$row["GenreName"]]))
        {
            array_push($checkboxdata, $row["GenreID"]);
            $checkbox_result = $_POST["checkbox_".$row["GenreName"]];
        }
    endforeach;
    create_eventgenres($conn, $checkboxdata, $name);
}
else
{
    header("location: ../../create_event.php");
    exit();
}