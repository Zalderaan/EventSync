<?php
session_start();

if(isset($_POST["delete_task"])){

    // get data
    $userID = $_SESSION["userID"];
    $taskID = $_POST["inputDel_taskID"];

    // instantiate TaskDeleteContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/taskDelete-classes.php";
    include "../classes/taskDeleteContr-classes.php";
    $taskDelete = new TaskDeleteContr($userID, $taskID);
    
    // running error handlers
    $taskDelete->deleteTask();

    // redirect
    header("location: ../../main-index.php");

}

?>