<?php

class LoginContr extends Login{
    private $login_username;
    private $login_pwd;

    public function __construct($login_username, $login_pwd){
        $this->login_username = $login_username;
        $this->login_pwd = $login_pwd;

    }

    public function loginUser(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../login-index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->login_username, $this->login_pwd);
    }

    // == METHODS FOR ERROR HANDLING ==

    // check for empty inputs
    private function emptyInput() {
        $result = false;

        if(empty($this->login_username) || empty($this->login_pwd)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
?>