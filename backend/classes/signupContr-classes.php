<?php

Class SignupContr extends Signup{

    private $firstName;
    private $lastName;
    private $userEmail;
    private $username;
    private $userPassword;
    private $confirmPass;

    public function __construct($firstName, $lastName, $userEmail, $username, $userPassword, $confirmPass){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userEmail = $userEmail;
        $this->username = $username;
        $this->userPassword = $userPassword;
        $this->confirmPass = $confirmPass;

    }

    public function signupUser(){

        // check for errors first
        if($this->emptyInput() == true) {
            header("location: ../../registration-index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUsername() == false) {
            header("location: ../../registration-index.php?error=invalidusername");
            exit();
        }

        if($this->invalidEmail() == false) {
            header("location: ../../registration-index.php?error=invalidemail");
            exit();
        }

        if($this->passwordMatch() == false) {
            header("location: ../../registration-index.php?error=passwords_not_match");
            exit();
        }

        if($this->usernameEmailTaken() == true) {
            header("location: ../../registration-index.php?error=user_or_email_taken");
            exit();
        }

        $this->setUser($this->firstName, $this->lastName, $this->userEmail,  $this->username, $this->userPassword);
    }

    // == METHODS FOR ERROR HANDLING ==

    // check for empty inputs
    private function emptyInput(){
        $result = false;

        if(empty($this->firstName) || empty($this->lastName) || empty($this->username) || empty($this->userEmail) || empty($this->userPassword) || empty($this->confirmPass)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    // check for invalid usernames
    private function invalidUsername(){
        $result = false;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){

            $result = false;

        } else {

            $result = true;
        }

        return $result;
    }

    // check for invalid email
    private function invalidEmail(){
        $result = false;

        if(!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)){

            $result = false;

        } else {

            $result = true;
        }

        return $result;
    }

    // check if passwords match
    private function passwordMatch(){
        $result = false;

        if($this->userPassword !== $this->confirmPass){
            
            $result = false;

        } else {

            $result = true;
        }

        return $result;
    }

    // check if username / email alr taken
    private function usernameEmailTaken() {
        $result = false;

        if($this->checkUser($this->userEmail, $this->username)){
            $result = true;

        } else {
            $result = false;

        }

        return $result;
    }
}
?>