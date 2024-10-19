<?php
// Start session and include navigation
session_start();
include('connections.php');

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query_account_type = mysqli_query($connections, "SELECT * FROM users WHERE email='$email'");
    $get_account_type = mysqli_fetch_assoc($query_account_type);
    
    $account_type = $get_account_type['account_type'];

    if ($account_type == 1) {
        echo "<script>window.location.href='Admin';</script>";
    } else {
        echo "<script>window.location.href='users';</script>";
    }
}

// Set default timezone and initialize variables
date_default_timezone_set("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");

$notify = $attempt = $log_time = "";
$end_time = date("h:i A", strtotime("+15 minutes", strtotime($time_now)));
$email = $password = "";
$emailErr = $passwordErr = "";

// Handle form submission
if (isset($_POST['btnLogin'])) {
    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = "email is required";
    } else {
        $email = $_POST['email'];
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST['password'];
    }

    // If no validation errors, proceed to check credentials
    if ($email && $password) {
        $email = mysqli_query($connections, "SELECT * FROM users WHERE email = '$email'");
        $check_row = mysqli_num_rows($check_email);

        // Check if the email exists
        if ($check_row > 0) {
            $fetch = mysqli_fetch_assoc($email);
            $db_first_name = $fetch['first_name'];
            $db_password = $fetch['password'];
            $db_attempt = $fetch['attempt'];
            $db_log_time = strtotime($fetch['log_time']);
            $my_log_time = $fetch['log_time'];
            $new_time = strtotime($time_now);
            $account_type = $fetch['account_type'];

            // Check if it's an admin account
            if ($account_type == 1) {
                if ($db_password == $password) {
                    $_SESSION['email'] = $email; 
                    echo "<script>window.location.href='Admin';</script>";
                } else {
                    $passwordErr = "Hi Admin! Your password is incorrect!";
                }
            } else { // Check for regular users
                if ($db_log_time <= $new_time) {
                    if ($db_password == $password) {
                        $_SESSION['email'] = $email;
                        mysqli_query($connections, "UPDATE users SET attempt='', log_time='' WHERE email='$email'");
                        echo "<script>window.location.href='users';</script>";
                    } else {
                        $attempt = (int)$db_attempt + 1;

                        // Lock the account after 3 attempts
                        if ($attempt >= 3) {
                            $attempt = 3;
                            mysqli_query($connections, "UPDATE users SET attempt='$attempt', log_time='$end_time' WHERE email='$email'");
                            $notify = "You have reached the maximum attempts. Please try again after 15 minutes: <b>$end_time</b>";
                        } else {
                            mysqli_query($connections, "UPDATE users SET attempt='$attempt' WHERE email='$email'");
                            $passwordErr = "Password is incorrect.";
                            $notify = "Login Attempt: <b>$attempt</b>";
                        }
                    }
                } else {
                    $notify = "Sorry $db_first_name, you must wait until: <b>$my_log_time</b> to log in again.";
                }
            }
        } else {
            $emailErr = "Email is not registered.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girly's Catering Company</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">

    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    <div class="back-btn">
        <a href="index.php"><i class='bx bx-x'></i></a>
    </div>

    <div class="login-container">

        <div class="login-details">

            <div class="login-title">

                <h1>Log In</h1>

                <h5>New to this site? <a href="#">Sign Up</a> </h5>

                <div class="google-login">

                    <h5>Log in with Google</h5>

                </div>

                <div class="outlook-login">

                    <h5>Log in with Outlook</h5>

                </div>

                <h6>or</h6>

                <div class="login-with-email">
                    <button class="login-email">

                        <h6>Login with Email</h6>

                    </button>
                </div>

            </div>

        </div>

    </div>

    <div class="login-form">

        <div class="login-containers">

            <div class="logins-form">

                <div class="login-titles">
                    <h1>Log In</h1>

                    <h5>New to this site? <a href="signup.php">Sign Up</a> </h5>
                </div>

                <div class="login-inputs">

                    <h4>Emails</h4>
                    <input type="email" placeholder="Enter Email" name="" id="">
                    <h4>Password</h4>
                    <input type="password" placeholder="Enter Password" name="" id="">
        
                </div>
        
                <div class="login-btn">
        
                    <input type="submit" value="Login">
        
                </div>

            </div>

        </div>

    </div>
    
</body>

<script>

const loginDetails = document.querySelector(".login-details");
const loginEmailBtn = document.querySelector(".login-with-email");
const loginForm = document.querySelector(".login-form");

loginEmailBtn.addEventListener("click", () => {
  loginForm.style.display = "block";
  loginEmailBtn.style.display = "none";
  loginDetails.style.display = "none";
});

const singupEmailBtn = document.querySelector(".login-with-email");
const signupForm = document.querySelector(".signup-form");

singupEmailBtn.addEventListener("click", () => {
    signupForm.style.display = "block";
    singupEmailBtn.style.display = "none";
});

</script>

<!-- <script src="./js/script.js"></script> -->
<script src="/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
<script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</html>