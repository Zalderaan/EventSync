<?php

class TaskDelete extends DbConnection{

    protected function unsetTask($userID, $taskID){
        $stmt = $this->connect()->prepare("DELETE FROM tasks WHERE userID = ? AND taskID = ?");
        // check for error
        if(!$stmt->execute(array($userID, $taskID))){
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