<?php

class TaskEdit extends DbConnection{

    protected function getTask($newTaskName, $userID, $taskID){
        $stmt = $this->connect()->prepare("UPDATE tasks SET task_name = ? WHERE userID = ? AND taskID = ?");
        // check for error
        if(!$stmt->execute(array($newTaskName, $userID, $taskID))){
            $stmt = null;
            header("locaiton: main-index.php?error=stmtfailed");
            exit();
        }

        // check if task exists in db
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: main-index.php?error=task_not_found");
            exit();
        }
    }
}
?>