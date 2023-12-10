<?php

class EventAddContr extends EventAdd{

    private $eventName;
    private $userID;
    private $eventDesc;
    private $eventDate;
    private $timeStart;
    private $timeStop;


    public function __construct($eventName, $userID, $eventDesc, $eventDate, $timeStart, $timeStop){
        $this->eventName = $eventName;
        $this->userID = $userID;
        $this->eventDesc= $eventDesc;
        $this->eventDate = $eventDate;
        $this->timeStart = $timeStart;
        $this->timeStop = $timeStop;
    }

    public function addEvent(){
        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../main-index.php?error=emptyinput");
            exit();
        }
        
        $this->setEvent($this->userID, $this->eventName, $this->eventDesc, $this->eventDate, $this->timeStart, $this->timeStop);
    }

    // == METHODS FOR ERROR HANDLING ==
    
    // check for empty inputs
    private function emptyInput(){
        $result = false;

        if(empty($this->eventName) || empty($this->eventDate) || empty($this->timeStart) || empty($this->timeStop)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}

?>