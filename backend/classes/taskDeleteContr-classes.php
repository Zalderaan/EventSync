<?php

class TaskDeleteContr extends TaskDelete{
    private $userID;
    private $taskID;

    public function __construct($userID, $taskID){
        $this->userID = $userID;
        $this->taskID = $taskID;
    }

    public function deleteTask(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../login-index.php?error=emptyinput");
            exit();
        }

        $this->unsetTask($this->userID, $this->taskID);
    }

    // == METHODS FOR ERROR HANDLING ==

    // check for empty inputs
    private function emptyInput() {
        $result = false;

        if(empty($this->taskID)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
?> 