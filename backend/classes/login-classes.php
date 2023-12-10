<?php
    
    class Login extends DbConnection{

        protected function getUser($login_username, $login_pwd){
            $stmt = $this->connect()->prepare("SELECT pwd FROM users WHERE username = ? OR email = ?;");

            // check for error
            if(!$stmt->execute(array($login_username, $login_username))){
                $stmt = null;
                header("locaiton: ../../login-index.php?error=stmtfailed");
                exit();
            }

            // check if user exists in db
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../../login-index.php?error=user_not_found");
                exit();
            }

            // check if passwords match
            $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);            
            $checkPwd = password_verify($login_pwd, $pwdHashed[0]["pwd"]);

            if($checkPwd == false){
                $stmt = null;
                header("location: ../../login-index.php?error=wrong_pwd");
                exit();

            } elseif($checkPwd == true) {
                $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? AND pwd = ?");

                // check for errors again
                if(!$stmt->execute(array($login_username, $pwdHashed[0]["pwd"]))){
                    $stmt = null;
                    header("location: ../../login-index.php?=stmtfailed");
                    exit();
                }

                // check if user exists in db again
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../../login-index.php?error=user_not_found");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION["userID"] = $user[0]["userID"];
                $_SESSION["username"] = $user[0]["username"];

                $stmt = null;
            }
        }
    }
?>