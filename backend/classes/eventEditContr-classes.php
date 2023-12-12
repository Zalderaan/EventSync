<?php

class EventEditContr extends EventEdit{
    private $newEventName;    
    private $newEventDesc;
    private $newEventDate;
    private $newEventTimeStart;
    private $newEventTimeStop;
    private $userID;
    private $eventID;

    public function __construct($newEventName, $newEventDesc, $newEventDate, $newEventTimeStart, $newEventTimeStop, $userID, $eventID){
        $this->userID = $userID;
        $this->eventID = $eventID;
        $this->newEventName = $newEventName;
        $this->newEventDesc = $newEventDesc;
        $this->newEventDate = $newEventDate;
        $this->newEventTimeStart = $newEventTimeStart;
        $this->newEventTimeStop = $newEventTimeStop;
    }

    public function updateEvent(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../login-index.php?error=emptyinput");
            exit();
        }

        // Get the current values from the database
        $currentValues = $this->getCurrentEventValues($this->eventID);

        // Use the new value if not empty, otherwise use the current value
        $newEventName = empty($this->newEventName) ? $currentValues['event_name'] : $this->newEventName;
        $newEventDesc = empty($this->newEventDesc) ? $currentValues['event_desc'] : $this->newEventDesc;
        $newEventDate = empty($this->newEventDate) ? $currentValues['event_date'] : $this->newEventDate;
        $newEventTimeStart = empty($this->newEventTimeStart) ? $currentValues['event_timeStart'] : $this->newEventTimeStart;
        $newEventTimeStop = empty($this->newEventTimeStop) ? $currentValues['event_timeStop'] : $this->newEventTimeStop;

        $this->getEvent($newEventName, $newEventDesc, $newEventDate, 
                        $newEventTimeStart, $newEventTimeStop, $this->userID, $this->eventID);
    }

    // == METHODS FOR ERROR HANDLING ==

    // check for empty inputs
    private function emptyInput() {
        $result = false;

        if(empty($this->eventID)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
?> 