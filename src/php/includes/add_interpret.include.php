<?php

//checks if user got here by pressing button
if(isset($_POST["submit"]))
{
    require_once 'database_handler.include.php';
    require_once 'general_functions.include.php';
    $name = $_POST["name"];
    $describtion = $_POST["describtion"];

    //check errors in input forms
    if(empty($name))
    {
        header("location: ../../add_interpret.php?error=empty_input");
        exit();
    }

    if(interpret_exists($conn, $name) === true)
    {
        header("location: ../../add_interpret.php?error=already_exists");
        exit();
    }
    session_start();
    add_interpret($conn, $name, $_SESSION["UserID"], $describtion);
    $data = get_genres($conn);
    $checkboxdata = array();
    foreach($data as $row):
        if(isset($_POST["checkbox_".$row["GenreName"]]))
        {
            array_push($checkboxdata, $row["GenreID"]);
            $checkbox_result = $_POST["checkbox_".$row["GenreName"]];
        }
    endforeach;
    create_interpretgenres($conn, $checkboxdata, $name);
}
else
{
    header("location: ../../add_interpret.php");
    exit();
}