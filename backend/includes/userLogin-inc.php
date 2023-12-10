<?php

if(isset($_POST["loginButton"]))
{   
    // Get data
    $login_username = $_POST["login_username"];
    $login_pwd = $_POST["login_pwd"];

    // Instantiate SignupContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/login-classes.php";
    include "../classes/loginContr-classes.php";
    $login = new LoginContr ($login_username, $login_pwd);

    // running error handlers
    $login->loginUser();

    // going back to reg page
    header("location: ../../main-index.php?error=none");
    exit();
}
?>