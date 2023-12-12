<?php
session_start();

if(isset($_POST["edit_event"])){

    // get data
    $newEventName = $_POST["edit_eventName"];
    $newEventDesc = $_POST["edit_eventDesc"];
    $newEventDate = $_POST["edit_eventDate"];
    $newEventTimeStart = $_POST["edit_eventTimeStart"];
    $newEventTimeStop = $_POST["edit_eventTimeStop"];
    $userID = $_SESSION["userID"];
    $eventID = $_POST["input_eventID"];

    // instantiate EventEditContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/eventEdit-classes.php";
    include "../classes/eventEditContr-classes.php";
    $eventEdit = new EventEditContr($newEventName, $newEventDesc, $newEventDate, $newEventTimeStart, $newEventTimeStop, $userID, $eventID);
    
    // running error handlers
    $eventEdit->updateEvent();

    
    // redirect
    header("location: ../../main-index.php");

}

?>