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
    echo "{$_SESSION['firstname']} {$_SESSION['lastname']} is logged in.";
 }

 # Dislay logout message
if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') {
    echo '<p>You have been successfully logged out.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include('include/head.php');
  include('include/navbar.php');
  ?>
</head>
<body>
    <br><br><br>
    <h2><b>Login</b></h2>
    <form action="login_action.php" method="post">
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br><br>

        <input type="submit" id=submit_button value="Login"><br><br>
        <hr>

        <div class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
        </div>

        <div class="create-account">
            <p>Don't have an account?<br> <a href="create_account.php">CREATE ACCOUNT</a></p>
        </div>
    </form>
    <?php include('include/footer.php'); ?>
</body>
</html>
