<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
   # Set page title and display header section.
	include ('session.php');
    include('include/head.php');
    include('include/navbar.php');
    ?>
  </head>

  <body>
<?php

// uncomment below to check error messages
// ini_set('display_errors', 1);
// error_reporting(E_ALL);



# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve selective item data from 'products' database table. 
$q = "SELECT * FROM products WHERE product_id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one of this product id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
    # Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '
	<div class="container">
			<div class="alert alert-secondary" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p>Another '.$row["product_name"].' has been added to your cart</p>
				<a href="index.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
			</div>
		</div>';
  } 
  else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['product_price'] ) ;
    echo '<div class="container">
			<div class="alert alert-secondary" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p>A '.$row["product_name"].' has been added to your cart</p>
			<a href="index.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
			</div>
		</div>' ;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('include/head.php'); ?>
	</head>
  <body>
     <div class="container">
<?php
      // connect to db
      $link = mysqli_connect('localhost', 'root', '', 'mktime');
      if (!$link) {
        die('Could not connect to MySQL: ' . mysqli_error());
      }
      echo 'Connected to the database successfully!';

      echo '<h3 class="text-center"> 
          <strong>Hello ' . (isset($_SESSION['firstname']) ? '' . $_SESSION['firstname'] : '') . '. Here is your shopping basket.</strong><br>
          <br>
      </h3>';
      ?>
	</div>
	
	</body>
  </html>

  <?php
  
# Close database connection.
mysqli_close($link);

include('include/footer.php');
?>