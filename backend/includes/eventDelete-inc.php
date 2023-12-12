<?php
session_start();

if(isset($_POST["delete_event"])){

    // get data
    $userID = $_SESSION["userID"];
    $eventID = $_POST["inputDel_eventID"];

    // instantiate EventDeleteContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/eventDelete-classes.php";
    include "../classes/eventDeleteContr-classes.php";
    $eventDelete = new EventDeleteContr($userID, $eventID);
    
    // running error handlers
    $eventDelete->deleteEvent();

    // redirect
    header("location: ../../main-index.php");

}

?>