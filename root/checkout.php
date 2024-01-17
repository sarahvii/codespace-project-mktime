<?php # DISPLAY CHECKOUT PAGE.

// uncomment below to check error messages
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('session.php');
include('include/head.php');
include('include/navbar.php');

# Check for passed total and cart.
if ( isset( $_SESSION['order_total'] ) && ( $_SESSION['order_total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
  # Open database connection.
  require ('connect_db.php');
  
  # Store buyer and order total in 'orders' database table.
  $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_SESSION['order_total'].", NOW() ) ";
  $r = mysqli_query ($link, $q);
  
  # Retrieve current order number.
  $order_id = mysqli_insert_id($link) ;
  
  # Retrieve cart items from 'products' database table.
  $q = "SELECT * FROM products WHERE product_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY product_id ASC';
  $r = mysqli_query ($link, $q);

  # Store order contents in 'order_contents' database table.
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO order_contents ( order_id, product_id, quantity, price )
    VALUES ( $order_id, ".$row['product_id'].",".$_SESSION['cart'][$row['product_id']]['quantity'].",".$_SESSION['cart'][$row['product_id']]['price'].")" ;
    $result = mysqli_query($link,$query);
  }
  
  # Close database connection.
  mysqli_close($link);

  # Display order number.
  echo '<br>
  <div style="display: flex; align-items: flex-start; justify-content: center; height: 100vh;">
  <div class="card" style="max-width: 750px; width: 100%;">
  <div class="card-header">
    Order number '. $order_id .'
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Thank you for your purchase!</b></h5>
    <p class="card-text">Hi, we are getting your order ready to be shipped. We will notify you when this has been sent. <br> In the meantime you can check your orders history below </p>

    <a href="order_history.php" class="btn btn-dark">Order history</a>
  </div>
</div>
  ';


  # Remove cart items.  
  $_SESSION['cart'] = NULL ;
}
# Or display a message.
else { echo '<br><p style="text-align: center";> There are no items in your cart.</p> ' ; }

// Clear the order total from the session after processing.
unset($_SESSION['order_total']);