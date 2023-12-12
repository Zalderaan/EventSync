<?php

class TaskEditContr extends TaskEdit{
    private $newTaskName;
    private $userID;
    private $taskID;

    public function __construct($newTaskName, $userID, $taskID){
        $this->userID = $userID;
        $this->taskID = $taskID;
        $this->newTaskName = $newTaskName;
    }

    public function updateTask(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../login-index.php?error=emptyinput");
            exit();
        }

        $this->getTask($this->newTaskName, $this->userID, $this->taskID);
    }

    // == METHODS FOR ERROR HANDLING ==

    // check for empty inputs
    private function emptyInput() {
        $result = false;

        if(empty($this->taskID) || empty($this->newTaskName)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
?> 