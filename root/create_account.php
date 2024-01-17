  <?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database
  require ('connect_db.php'); 
  
  # Initialise error array
  $errors = array();

  # Check for a first name
  if ( empty( $_POST[ 'firstname' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'firstname' ] ) ) ; }

  # Check for a last name
  if (empty( $_POST[ 'lastname' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'lastname' ] ) ) ; }

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
  if (empty($errors)) {
    $reg_date = date('Y-m-d H:i:s');
    $q = "INSERT INTO users (firstname, lastname, email, password, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), '$reg_date')";
    $r = @mysqli_query($link, $q);
    if ($r) {
      // Start a session and log the user in
      session_start();
      $_SESSION['firstname'] = $fn;
      $_SESSION['lastname'] = $ln;
      $_SESSION['email'] = $e;

      // Display an alert and redirect to the index page
      echo '<script type="text/javascript">
              alert("Thank you for registering with us ' . $fn . '! Please log in.");
              window.location = "login.php";
            </script>';
    } else {
      echo '<div class="container">
              <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <p>Registration failed. Please try again.</p>
              </div>
            </div>';
    }
  
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
		<?php
		include('include/head.php');
		include('include/navbar.php'); 
		?>
</head>
<body>
   
    <br><br>
    <h2><b>Create account</b></h2>
    <form action="create_account.php" method="POST">

        <label for="Name">First Name:</label>
        <input type="name" id="firstname" name="firstname" placeholder="Enter first name" required><br>

        <label for="Name">Last Name:</label>
        <input type="name" id="lastname" name="lastname" placeholder="Enter last name" required><br>

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
    <?php include('include/footer.php'); ?>
</body>
</html>
