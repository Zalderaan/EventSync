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
    
    <!-- stylesheets & scripts -->
    <link rel="icon" type="image/x-icon" href="/login-page/pics/calendar-icon-blue.png ">
    <link rel="stylesheet" href="stylesheets/login-style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>
</head>

<body class="text-center">
    <!-- include db connection file -->
    <?php include 'backend/classes/dbConnection-classes.php'; ?>


    <div class="container-login-page container-fluid">

        <p id="brand">
            <img src="../src/pics/calendar-icon-blue.png" alt="icon" height="35px" width="35px">
            <b>EventSync</b>
        </p>

        <p id="login-text">Login</p>

        <form action="backend/includes/userLogin-inc.php" method="post">
            <div class="inputs">
                <div class="row justify-content-center my-5">
                    <div class="col-lg-4">
        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="login_username" name="login_username" placeholder="Username" required>
                            <label for="login_username">Username</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="password" class="form-control" id="login_pwd" name="login_pwd" placeholder="Password" required>
                            <label for="login_pwd">Password</label>
                        </div>
                        
                        <div class="login-button">
                            <div class="d-grid gap-2 col-6 mx-auto justify-content-center">
                                <button class="btn btn-primary" type="submit" id="loginButton" name="loginButton" >Login</button>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </form>

        <div class="forgot-pass">
            <div class="text-center">
                <a href="#forgot-pass">Forgot Password?</a>
            </div>
        </div>

        <div class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </div>

        <div class="create-acc-button">
                <a href="registration-index.php">Create an account</a>
        </div>
    </div>

</body>
</html>   