<?php

class EventEdit extends DbConnection{

    protected function getEvent($newEventName, $newEventDesc, $newEventDate, $newEventTimeStart, $newEventTimeStop, $userID, $eventID){
        
        $formatted_newEventTimeStart = date("h:iA", strtotime($newEventTimeStart));
        $formatted_newEventTimeStop = date("h:iA", strtotime($newEventTimeStop));

        $stmt = $this->connect()->prepare("UPDATE events
                                        SET event_name = ?, 
                                            event_desc = ?, 
                                            event_date = ?, 
                                            event_timeStart = ?, 
                                            event_timeStop = ? 
                                        WHERE userID = ? AND eventID = ?");

        // check for error
        if(!$stmt->execute(array($newEventName, $newEventDesc, $newEventDate, $formatted_newEventTimeStart, $formatted_newEventTimeStop, $userID, $eventID))){
            $stmt = null;
            header("locaiton: main-index.php?error=stmtfailed");
            exit();
        }

        // check if task exists in db
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: main-index.php?error=event_not_found");
            exit();
        }
    }

    protected function getCurrentEventValues($eventID){
        $stmt = $this->connect()->prepare("SELECT * FROM events WHERE eventID = ?");

        $stmt->execute(array($eventID));

        // fetch in am assoc array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the statement
        $stmt = null;

        return $result;
    }
}
?>