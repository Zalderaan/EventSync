<?php

class EventDelete extends DbConnection{

    protected function unsetEvent($userID, $eventID){
        $stmt = $this->connect()->prepare("DELETE FROM events WHERE userID = ? AND eventID = ?");
        // check for error
        if(!$stmt->execute(array($userID, $eventID))){
            $stmt = null;
            header("locaiton: main-index.php?error=stmtfailed");
            exit();
        }

        // check if event exists in db
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: main-index.php?error=event_not_found");
            exit();
        }
    }
}
?>