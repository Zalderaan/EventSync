<?php
session_start();

if(isset($_POST["get_current_date"])){

    // get data
    $currentDate = $_POST["current_date"];

    // instantiate SignupContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/eventAdd-classes.php";
    include "../classes/eventAddContr-classes.php";
    $event = new EventAddContr($eventName, $userID, $eventDesc, $eventDate, $timeStart, $timeStop);

    // running error handlers
    $event->addEvent();

    // redirect
    header("location: ../../main-index.php?error=none");

}

?>