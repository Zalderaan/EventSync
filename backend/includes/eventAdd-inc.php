<?php
session_start();

if(isset($_POST["create_event"])){

    // get data
    $userID = $_SESSION["userID"];
    $eventName = $_POST["eventName"];
    $eventDesc = $_POST["eventDesc"];
    $eventDate = $_POST["eventDate"];
    $timeStart = $_POST["timeStart"];
    $timeStop = $_POST["timeStop"];

    // instantiate SignupContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/eventAdd-classes.php";
    include "../classes/eventAddContr-classes.php";
    $event = new EventAddContr($eventName, $userID, $eventDesc, $eventDate, $timeStart, $timeStop);
    
    // running error handlers
    $event->addEvent();

    // redirect
    header("location: ../../main-index.php");

}

?>