<?php 

session_start();

// uncomment below to check error messages
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ( 'include/head.php' ) ;
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}

# Display session data
if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
    echo "{$_SESSION['firstname']} {$_SESSION['lastname']}";
 }

 # Dislay logout message
if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') {
    echo '<p>You have been successfully logged out.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="styles.css">
     <title>MK Time</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">MK Time</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled">Disabled</a>
                <a class="nav-link" href="\mktime\root\login.php">Login</a>
            </div>
        </div>
    </nav>
    <br><br><br>
    <h2><b>Login</b></h2>
    <form action="login_action.php" method="post">
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br><br>

        <input type="submit" value="Login"><br><br>
        <hr>

        <div class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
        </div>

        <div class="create-account">
            <p>Don't have an account?<br> <a href="create_account.php">CREATE ACCOUNT</a></p>
        </div>
    </form>
</body>
</html>
