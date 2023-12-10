<?php
session_start();

if(isset($_POST["add_task"])){

    // get data
    $userID = $_SESSION["userID"];
    $taskName = $_POST["taskName"];

    // instantiate SignupContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/taskAdd-classes.php";
    include "../classes/taskAddContr-classes.php";
    $task = new TaskAddContr ($userID, $taskName);

    // running error handlers
    $task->addTask();

    // redirect
    header("location: ../../main-index.php?error=none");

}

?>