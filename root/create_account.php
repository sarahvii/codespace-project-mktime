<?php

// uncomment below to check error messages
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database
  require ('connect_db.php'); 
  
  # Initialise error array
  $errors = array();

  # Check for a first name
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass) 
	VALUES ('$fn', '$ln', '$e', SHA2('$p',256))";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="container">
<div class="alert alert-secondary" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
  </button>
    <h4 class="alert-heading"Registered!</h4>
    <p>You are now registered.</p>
    <a class="alert-link" href="login.php">Login</a>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }

  # Or report errors.
  else 
  {
    echo '<div class="container">
	   <div class="alert alert-secondary" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		 <span aria-hidden="true">×</span>
	      </button>
		<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
    <br><br>
    <h2><b>Create account</b></h2>
    <form action="create_account.php" method="POST">

        <label for="Name">First Name:</label>
        <input type="name" id="first_name" name="first_name" placeholder="Enter first name" required><br>

        <label for="Name">Last Name:</label>
        <input type="name" id="last_name" name="last_name" placeholder="Enter last name" required><br>

        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address" required><br>

        <label for="password">Password:</label>
        <input type="password" id="pass1" name="pass1" placeholder="Enter password" required><br>

        <label for="password">Repeat Password:</label>
        <input type="password" id="pass2" name="pass2" placeholder="Repeat Password" required><br><br>

        <input type="submit" value="Create Account"><br><br>
        <hr>

        <div class="already-have-account">
            <a href="login.php">ALREADY HAVE AN ACCOUNT?</a></p>
        </div>
    </form>
</body>
</html>
