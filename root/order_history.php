<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();
	if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
	}
	
	include('include/head.php'); ?>
	<!-- navbar -->
  <?php include('navbar.php'); ?>
    <title>Order History</title>
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

	  echo'<h1>Order History</h1>';
	  
	  //fetch order history data from db
      $sql = "SELECT * FROM orders WHERE user_id = $user_id";
      $result = mysqli_query($link, $sql);
	  
	  if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';

        // output data of each row into product card
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-sm-4">';
          echo '  <div class="card" style="width: 18rem; margin: 1px;">';
		 
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">Order date: '.$row["order_date"].'</h5>';
          echo '      <p class="card-text">ID: '.$row["order_id"].'</p>';
          echo '      <p class="card-text">Price: £'.$row["total"].'</p>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo "0 results";
      }
      mysqli_close($link);
    ?>
	</div>
</body>
</html>