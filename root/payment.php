    <?php
    // uncomment below to check error messages
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include('session.php');
    
// uncomment below to check error messages
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST'  && isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart'])))
{
  # Connect to the database
  require ('connect_db.php'); 
  
  # Initialise error array
  $errors = array();

  # Check for a card number
  if ( empty( $_POST[ 'cardnumber' ] ) ) {
	  $errors[] = 'Enter your card number.' ;
} else {
   $cn = mysqli_real_escape_string( $link, trim( $_POST[ 'cardnumber' ] ) ) ; 

 # Check if the card number is numeric and exactly 16 digits long
    if (!is_numeric($cn) || strlen($cn) !== 16) {
        $errors[] = 'Card number must be numeric and exactly 16 digits long.';
    }
}

  # Check for a sort code
if (empty($_POST['sort-code'])) {
    $errors[] = 'Enter your sort code.';
} else {
    $sc = mysqli_real_escape_string($link, trim($_POST['sort-code'] ) );

    # Check if the sort code is numeric and exactly 6 digits long
    if (!is_numeric($sc) || strlen($sc) !== 6) {
        $errors[] = 'Sort code must be numeric and exactly 6 digits long.';
    }
}
  
  # On success register user inserting into 'payment' database table.
  if ( empty( $errors ) ) 
	  {
    $q = "INSERT INTO payments(payment_amount, account_no, bsb_no, user_id)
	VALUES ('" . $_GET['total'] . "', '$cn', '$sc', '" . $_SESSION['user_id'] . "')";

    $r = @mysqli_query ( $link, $q ) ;
    if ($r) { 
      echo '<div class="container">
              <div class="alert alert-secondary" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="alert-heading"Payment processed!</h4>
                <p>You will now be redirected.</p>
                <a class="alert-link" href="login.php">Login</a>
              </div>
            </div>';
             } else {
      echo '<div class="container">
              <div class="alert alert-secondary" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
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

	<h1>Payment Details</h1>
	<?php
	echo'
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form method="post" action="checkout.php?total=' . $_GET['total'] . '">
                    <div class="col-50">
						<label for="ccnum">Card number</label>
						<input type="text" id="cnum" name="cardnumber" placeholder="1111 2222 3333 4444" required style="width: 300px;">
						<label for="sort-code">Sort-Code</label>
						<input type="text" id="scode" name="sort-code" placeholder="123456" required style="width: 200px;">
                    </div>
                    <input type="submit" value="Make Payment" class="btn btn-primary" style="border: 1px solid #ccc;">
                </form>
            </div>
        </div>
    </div>';


    	
    include('include/footer.php');
?>

</body>
</html>
