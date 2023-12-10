<?php

class TaskAddContr extends TaskAdd {
    private $userID;
    private $taskName;

    public function __construct($userID, $taskName){
        $this->userID = $userID;
        $this->taskName = $taskName;
    }

    public function addTask(){
        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../main-index.php?error=emptyinput_taskAdd");
            exit();
        }

        $this->setTask($this->userID, $this->taskName);
    }

    // == METHODS FOR ERROR HANDLING ==
    
    // check for empty inputs
    private function emptyInput(){
        $result = false;

        if(empty($this->taskName)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
?>
