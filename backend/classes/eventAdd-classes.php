<?php


class EventAdd extends DbConnection{

    protected function setEvent($userID, $eventName, $eventDesc, $eventTime, $timeStart, $timeStop){

        // format timeStart and timeStop
        $formattedTimeStart = date("h:iA", strtotime($timeStart));
        $formattedTimeStop = date("h:iA", strtotime($timeStop));

        $stmt = $this->connect()->prepare("INSERT INTO events (userID, event_name, event_desc, event_date, event_timeStart, event_timeStop) VALUES (?, ?, ?, ?, ?, ?);");

        // check if it ran w/o error
        if(!$stmt->execute(array($userID, $eventName, $eventDesc, $eventTime, $formattedTimeStart, $formattedTimeStop))){
            $stmt = null;
            header("location: ../../main-index.php?error=setEvent_failed");
            exit();
        }

        $stmt = null; 
    }
}

?>