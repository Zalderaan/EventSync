<?php

class TaskDisplay extends DbConnection {

    public function getUserTasks($userID){
        $stmt = $this->connect()->prepare("SELECT * FROM tasks WHERE userID = ?");

        // check for errors first
        if(!$stmt->execute(array($userID))){
            $stmt = null;
            header("location: ../../main-index.php?error=getEvent_failed");
            exit();
        }
        
        // fetch the events data
        $fetched_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        
        return $fetched_tasks;
            
    }
}
?>