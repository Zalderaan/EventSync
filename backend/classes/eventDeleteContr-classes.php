<?php

class EventDeleteContr extends EventDelete{
    private $userID;
    private $eventID;

    public function __construct($userID, $eventID){
        $this->userID = $userID;
        $this->eventID = $eventID;
    }

    public function deleteEvent(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../login-index.php?error=emptyinput");
            exit();
        }

        $this->unsetEvent($this->userID, $this->eventID);
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