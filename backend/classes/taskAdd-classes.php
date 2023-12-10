<?php

class TaskAdd extends DbConnection{

    protected function setTask($userID, $taskName){
        $stmt = $this->connect()->prepare("INSERT INTO tasks (userID, task_name) VALUES (?, ?);");

        // check if it ran w/o error
        if(!$stmt->execute(array($userID, $taskName))){
            $stmt = null;
            header("location: ../../main-index.php?error=taskAdd_failed");
            exit();
        }

        $stmt = null; 
    }
} 
?>