<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include('session.php');
	if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
	}
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

	  echo'<h1>Order History</h1>';
	  
	  //fetch order history data from db
      $sql = "SELECT * FROM orders WHERE user_id = $user_id";
      $result = mysqli_query($link, $sql);
	  
	  if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';

        // output data of each row into product card
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-sm-4">';
          echo '  <div class="card" style="width: 18rem; margin: 5px;">';
		 
          echo '    <div class="card-body">
				<h5 class="card-title">Order # '.$row["order_id"].'</h5>
				<p class="card-text">Order date: '.$row["order_date"].'</p>
				<p class="card-text">Total Cost: £'.$row["total"].'</p>
				<a href="order_details.php?id=' . $row["order_id"] . '" class="btn btn-secondary btn-block">Order details</a>
					</div>
					</div>
					</div>';
        }
        echo '</div>';
      } else {
        echo "0 results";
      }
      mysqli_close($link);
	?>
	</div>
	<?php  include('include/footer.php'); ?>
</body>
</html>