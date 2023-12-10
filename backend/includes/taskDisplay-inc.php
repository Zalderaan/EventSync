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
            echo          $task["task_name"];
            echo '      </div>';
            echo '';
            echo '      <div class="task-buttons">';
            echo '        <!-- editTask trigger modal -->';
            echo '        <div class="button-custom">';
            echo '          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTask">';
            echo '            <i class="material-icons" style="font-size: 16px;">edit</i>';
            echo '          </button>';
            echo '        </div>';
            echo '';
            echo '        <!-- deleteTask trigger modal -->';
            echo '        <div class="button-custom">';
            echo '          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteTask">';
            echo '            <i class="material-icons" style="font-size: 16px;">delete</i>';
            echo '          </button>';
            echo '        </div>';
            echo '';
            echo '      </div>';
            echo '';
            echo '  </div>';
            echo '</li>';
        }
    }
}
?>
