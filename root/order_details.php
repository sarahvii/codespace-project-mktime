<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    session_start();
    include('include/head.php');
    include('include/navbar.php');
    ?>
  </head>

  <body>
    <div class="container">
<!-- Content here -->
  <?php
 
        //connect to db
      $link = mysqli_connect('localhost','root','','mktime'); 
      if (!$link) { 
        die('Could not connect to MySQL: ' . mysqli_error()); 
      } 
      echo 'Connected to the database successfully!';
	  
	    // get order id from URL
		$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		
		// fetch order details
    $sql = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($link, $sql);

	  echo'<h1>Order Details</h1>';
	  
	    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
	  echo '	<div class="order-details"
				<h5 class="card-title">Order # '.$row["order_id"].'</h5>
				<p class="card-text">Order date: '.$row["order_date"].'</p>
				<p class="card-text">Total Cost: £'.$row["total"].'</p>
				<p class="card-text">Payment ID: '.$row["payment_id"].'</p>
				<h6 class"card-title">Items Ordered:</h6>
				</div>';
    } else {
      echo "Order not found.";
    }

    mysqli_close($link);
    ?>
	  
	</div>
   <?php include('include/footer.php'); ?>
  </body>
</html>
