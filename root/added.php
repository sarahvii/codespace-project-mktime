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

    <body class="d-flex flex-column min-vh-100">
    <div class="container flex-grow-1">
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
    echo '<br>
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
    echo '<br>
			<div class="container">
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



  <?php
  
# Close database connection.
mysqli_close($link);

?>

</div>
<?php
 include('include/footer.php'); ?>
</body>
</html>