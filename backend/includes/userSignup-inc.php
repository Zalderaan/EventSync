<?php

if(isset($_POST["sign-up"]))
{   
    // Get data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userEmail = $_POST["userEmail"];
    $username = $_POST["username"];
    $userPassword = $_POST["userPassword"];
    $confirmPass = $_POST["confirmPass"];

    // Instantiate SignupContr class
    include "../classes/dbConnection-classes.php";
    include "../classes/signup-classes.php";
    include "../classes/signupContr-classes.php";
    $signup = new SignupContr ($firstName, $lastName, $userEmail, $username, $userPassword, $confirmPass);

    // running error handlers
    $signup->signupUser();

    // going back to reg page
    header("location: ../../registration-index.php?error=none");
}
?>