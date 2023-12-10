<?php

// Display events for the current user
if(isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $selectedDate = $_POST["selected_date"];

    // Instantiate necessary classes for displaying events
    /* include "backend/classes/dbConnection-classes.php"; */ // see NOTE TO SELF in main-index.php
    include "backend/classes/eventDisplay-classes.php";

    $eventDisplay = new EventDisplay();

    // Get user's events
    $userEvents = $eventDisplay->getUserEvents($userID, $selectedDate);

    // Sort the events by time
    usort($userEvents, function($a, $b) {
        // Convert time strings to timestamps for comparison
        $timeA = strtotime($a["event_timeStart"]);
        $timeB = strtotime($b["event_timeStart"]);

        // Compare the timestamps
        return $timeA <=> $timeB;
    });

    // == DISPLAY THE EVENTS ==

    if(empty($userEvents)){ // check if $userEvents array is empty
        echo '<div class="text-center" style="position: relative; top: 1.5rem; right: 1rem;">No events scheduled. Free day?</div>';

    } else { // if not empty, print out in event in card format
        foreach ($userEvents as $event) {
            echo "<li>";
            echo ' <div class="card">';
            echo '  <div class="card-body">';
            echo '     <div class="card-title">';
            echo '       <div class="container event-container">';
            echo '         <span title="'. $event["event_name"] . '" style=" max-width:250px; overflow:hidden;text-overflow: ellipsis; white-space:nowrap;"><input type="checkbox"><b class="event-name"> ' . $event["event_name"] . '</b></span>';
            echo '       </div>';
            echo '     </div>';
            echo '';         
            echo '     <div class="card-text">';
            echo '       <div class="container desc-container">';
            echo '         <div class="event-desc card-text">';
            echo '           ' . $event["event_desc"];
            echo '         </div>';
            echo '       </div>';
            echo '     </div>';
            echo '     <br>';
            echo '     <div class="card-footer footer-container">';
            echo '         <p>' . $event["event_date"] . '</p>';
            echo '         <p>' . ' ' . $event["event_timeStart"] . ' - ' . $event["event_timeStop"] .'</p>';
            echo '     </div>';
            echo '   </div>';
            echo ' </div>';
            echo '</li>';
        }
    }
}
?>
