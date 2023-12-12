<?php

// Display events for the current user
if(isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];

    // Instantiate necessary classes for displaying events
    /*include "backend/classes/dbConnection-classes.php";*/ // see NOTE TO SELF in main-index
    include "backend/classes/taskDisplay-classes.php";

    $taskDisplay = new TaskDisplay();

    // Get user's events
    $userTasks = $taskDisplay->getUserTasks($userID);

    // == DISPLAY THE EVENTS ==

    if(empty($userTasks)){ // check if $userEvents array is empty
        echo '<div class="text-center" style="position: relative; right: 1rem; top: 2rem; color: white">No tasks logged.</div>';

    } else { // if not empty, print out in event in card format
        foreach ($userTasks as $task) {
            echo '<li>';
            echo '  <div class="card">';
            echo '    <div class="card-body task-container">';
            echo '      <div class="task-style" title="' . $task["task_name"] . '">';
            echo '        ' . $task["task_name"];
            echo '      </div>';
            echo '    </div>';
            echo '';
            echo '    <div class="card-footer" style="display: flex; justify-content: flex-end">';
            echo '      Task ID: '  . $task["taskID"];
            echo '  </div>';
            echo '</li>';
        }
    }
}
?>
