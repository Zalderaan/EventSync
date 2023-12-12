<?php
session_start();

if(isset($_POST["edit_task"])){

    // get data
    $newTaskName = $_POST["edit_taskName"];
    $userID = $_SESSION["userID"];
    $taskID = $_POST["inputEdit_taskID"];

    // instantiate TaskEditContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/taskEdit-classes.php";
    include "../classes/taskEditContr-classes.php";
    $taskEdit = new TaskEditContr($newTaskName, $userID, $taskID);
    
    // running error handlers
    $taskEdit->updateTask();

    
    // redirect
    header("location: ../../main-index.php");

}

?>