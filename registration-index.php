<?php
    // start session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSync</title>
    <link rel="icon" type="image/x-icon" href="/login-page/pics/calendar-icon-blue.png ">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>

    <link rel="stylesheet" href="stylesheets/reg-style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">


</head>

<body class="text-center justify-content-center">

    <!-- the rest of front end -->
    <div class="container-registration container-fluid justify-content-center">

        <div class="sign-up-forms row">
            <div class="left-side col-md-7">
                <p id="registration-text">Sign-up</p>

                <form action="backend/includes/userSignup-inc.php" method="post">
                    <div class="row justify-content-center mt-5 my-2">
                        <div class="col-md-4">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                <label for="firstName">First Name</label>
                            </div>
                            </div>
        
                        <div class="col-md-4">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                <label for="lastName">Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-2">
                        <div class="col-md-8">
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" required>
                                <label for="userEmail">Email</label>
                            </div>
        
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-2">
                        <div class="col-md-4">
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" required>
                                <label for="userPassword">Password</label>
                            </div>
                            </div>
        
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password" required>
                                <label for="confirmPass">Confirm Password</label>
                            </div>
                        </div>
                    </div>
    
                    <div class="row justify-content-center my-2">
                        <div class="col-md-4 sign-up-button">
                            <div class="d-grid gap-2 col-6 mx-auto justify-content-center">
                                <button class="btn btn-primary" type="submit" name="sign-up">Sign-up</button>
                            </div>
                            <p id="sign-in-link" style="color:rgb(28, 10, 100); font-size: 0.8rem;">
                                Already have an account? <a href="login-index.php">Sign in here</a>
                            </p>
    
                            </div>
                     </div>

                </form>
            </div>

            <div class="right-side col-md-5">
                <div class="right-text">
                    <p>
                        <span id="eventSync">EventSync:</span> Events and Schedule Organizer
                    </p>
                </div>
            </div>

        </div>
        
    </div>

</body>

</html>