<?php

class Signup extends DbConnection{

    protected function setUser($firstName, $lastName, $userEmail, $username, $userPassword){
        $stmt = $this->connect()->prepare("INSERT INTO users (first_name, last_name, email, username, pwd) VALUES (?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

        // check if it ran w/o error
        if(!$stmt->execute(array($firstName, $lastName, $userEmail, $username, $hashedPwd))){
            $stmt = null;
            header("location: ../../registration-index.php?error=stmtfailed");
            exit();
        }

        $stmt = null; 
    }

    protected function checkUser($userEmail, $username){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE email = ? OR username = ?;');

        // check if it ran w/o error
        if(!$stmt->execute(array($userEmail, $username))){
            $stmt = null;
            header("location: ../../registration-index.php?error=stmtfailed");
            exit();
        }

        // check if the returns a row (it means the database alr has that username or email)
        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = true;

        } else {
            $resultCheck = false;

        }

        return $resultCheck;
    }
}

?>