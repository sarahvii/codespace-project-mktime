<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include('session.php');
    include('include/head.php');
    include('include/navbar.php');
    ?>
  </head>

  <body>
    <div class="container">
	
      <br>
      <?php
      require('connect_db.php');

      echo '<h3 class="text-center"> 
          <strong>Hello ' . (isset($_SESSION['firstname']) ? '' . $_SESSION['firstname'] : '') . ' and Welcome to MK Time!</strong><br>
          <small class="text-muted"><em>Watches for every wrist</em></small>
          <br>
      </h3>';
?>
	<div class='search-form'>
	 <form action="index.php" method="GET">
        <input type="text" id="search-text" name="query" />
        <input type="submit" id="submit-search" value="Search" />
        <a href="index.php">Clear Search</a>
      </form>
	  </div>
	  <style>
    .search-form {
		    width: 50%; 
        margin: 0 22.5%;
        text-align: center;
    }
</style>

<?php
      // Initialize $results variable
      $results = array();

      // Check if search form is submitted
      if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $query = mysqli_real_escape_string($link, $query);
		
	        $raw_results = mysqli_query($link, "SELECT * FROM `products`
            WHERE (`product_name` LIKE '%" . $query . "%') 
            OR (`product_desc` LIKE '%" . $query . "%')
            OR (`key_features` LIKE '%" . $query . "%')")
          or die(mysqli_error($link));

        if (mysqli_num_rows($raw_results) > 0) {
			 echo '<div class="row">';
          while ($row = mysqli_fetch_assoc($raw_results)) {
             	echo '
		<div class="col-md-3 d-flex justify-content-center">
		<div class="card" style="width: 18rem; margin: 5px; transition: box-shadow 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.1)\'; this.style.transform=\'scale(1.05)\'" onmouseout="this.style.boxShadow=\'none\'; this.style.transform=\'none\'";>
		<img src="'. $row['product_img'].'" class="card-img-top" alt="'. $row['product_name'].'">
		<div class="card-body text-center">
		<h5 class="card-title">'. $row['product_name'].'</h5>
		<p class="card-text">'. $row['product_desc'].'</p>
		</div>
		<div class="card-footer bg-transparent border-dark text-center">
		<p class="card-text">&pound '. $row['product_price'].'</p>
		</div>
		<div class="card-footer text-muted">
		<a href="added.php?id='.$row['product_id'].'" class="btn btn-primary btn-block">Add to Cart</a>
		<br>
		<a href="product_details.php?id=' . $row["product_id"] . '" class="btn btn-secondary btn-block">Product details</a>
		</div>
		</div>
		</div>  
	';
          }
        }
      } else {
        // If no search, get all products
        $sql2 = "SELECT * FROM products";
	  $result = mysqli_query($link, $sql2);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="row">';
          // Fetch and display all products
          while ($row = mysqli_fetch_assoc($result)) {
           echo '
		<div class="col-md-3 d-flex justify-content-center">
		<div class="card" style="width: 18rem; margin: 5px; transition: box-shadow 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.1)\'; this.style.transform=\'scale(1.05)\'" onmouseout="this.style.boxShadow=\'none\'; this.style.transform=\'none\'";>
		<img src="' . $row['product_img'] . '" class="card-img-top" alt="' . $row['product_name'] . '" style="height: 100%; height: 280px; object-fit: cover;">
		<div class="card-body text-center">
		<h5 class="card-title">'. $row['product_name'].'</h5>
		<p class="card-text">'. $row['product_desc'].'</p>
		</div>
		<div class="card-footer bg-transparent border-dark text-center">
		<p class="card-text">&pound '. $row['product_price'].'</p>
		</div>
		<div class="card-footer text-muted">
		<a href="added.php?id='.$row['product_id'].'" class="btn btn-primary btn-block">Add to Cart</a>
		<br>
		<a href="product_details.php?id=' . $row["product_id"] . '" class="btn btn-secondary btn-block">Product details</a>
		</div>
		</div>
		</div>  
	';
          }
        }
      }

      mysqli_close($link);
      ?>
    </div>
    </div>
    <?php include('include/footer.php'); ?>
  </body>
</html>
