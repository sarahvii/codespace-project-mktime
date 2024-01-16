<!DOCTYPE html>
<html lang="en">
  <head>
  <?php # DISPLAY SHOPPING CART PAGE.

include('session.php');
include('include/head.php');
include('include/navbar.php');

?>
  </head>
  <body>
  <?php

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $product_id => $product_qty )
  {
    # Ensure values are integers.
    $id = (int) $product_id;
    $qty = (int) $product_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.
  require ('connect_db.php');
  
  # Retrieve all items in the cart from the 'products' database table.
  $q = "SELECT * FROM products WHERE product_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY product_id ASC';
  $r = mysqli_query ($link, $q);

  # Display body section with a form and a table.
  echo '<form action="cart.php" method="post">
	  <table class="table" style="width: 200%;">
	   <thead>
	    <tr>
      <th>Items in your cart</th>
      <th>Quantity</th>
      <th>Unit Price</th>
      <th>Cost</th>
	   </thead>
	   <tbody>
	  <tr>';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['product_id']]['quantity'] * $_SESSION['cart'][$row['product_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<tr>
        <td><img src='{$row['product_img']}' alt='{$row['product_name']}' style='width: 150px; height: 100px;'></td>
        <td>
          <input type=\"text\" size=\"2\" name=\"qty[{$row['product_id']}]\" value=\"{$_SESSION['cart'][$row['product_id']]['quantity']}\">
          <button type=\"button\" onclick=\"updateQuantity('{$row['product_id']}', 'increment')\">+</button>
          <button type=\"button\" onclick=\"updateQuantity('{$row['product_id']}', 'decrement')\">-</button>
          <button type=\"button\" onclick=\"updateQuantity('{$row['product_id']}', 'remove')\">Remove</button>
        </td>
        <td>@ {$row['product_price']} = </td> 
        <td> £ ".number_format ($subtotal, 2)."</td>
      </tr>";
  }
  
  # Close the database connection.
  mysqli_close($link); 
  
  # Display the total.
  echo ' <tr><td></td><td></td><td></td>
  <td>Total = £ '.number_format($total,2).'</td>
  </tr>
  <tr><td></td><td></td><td></td>
  <td><input type="submit" name="submit" class="btn btn-light btn-block" value="Update My Cart"></td>
  </tr>
  <tr><td></td><td></td><td></td>
  <td><a href="payment.php?total=' . $total . '" class="btn btn-dark btn-block">Checkout Now</a></td>
  </table>
  </form>';
}
  else {
# Or display a message.
echo '<div class="alert alert-secondary" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
   </button>
   <p>Your cart is currently empty.</p>
</div>' ; }
 include('include/footer.php');
?>
<script>
function updateQuantity(productId, action) {
    var quantityInput = document.getElementsByName('qty[' + productId + ']')[0];
    var currentQuantity = parseInt(quantityInput.value);

    if (action === 'increment') {
        quantityInput.value = currentQuantity + 1;
    } else if (action === 'decrement' && currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    } else if (action === 'remove') {
        quantityInput.value = 0;
    }
}
</script>
</body>
</html>