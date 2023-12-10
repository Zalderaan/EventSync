<?php

class EventDisplay extends DbConnection {
    
    public function getUserEvents($userID, $selectedDate){
        $stmt = $this->connect()->prepare("SELECT * FROM events WHERE userID = ? AND event_date = ?");

        // check for errors first
        if(!$stmt->execute(array($userID, $selectedDate))){
            $stmt = null;
            header("location: ../../main-index.php?error=getEvent_failed");
            exit();
        }

        // fetch the events data
        $fetched_events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $fetched_events;
    }
}
?>