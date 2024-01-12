<!doctype html>
<html lang="en">
  <head>
	<?php session_start();
	include('include/head.php'); ?>
	
	<!-- navbar -->
	
		<?php include('navbar.php'); ?>
	
  </head>

<body>
<div class="container">
<!-- Content here -->

<?php
// connect to the database
$link = mysqli_connect('localhost', 'root', '', 'mktime');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

// Initialize $results variable
$results = array();

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $query = mysqli_real_escape_string($link, $query);

    $raw_results = mysqli_query($link, "SELECT * FROM `products`
        WHERE (`product_name` LIKE '%" . $query . "%') 
        OR (`product_desc` LIKE '%" . $query . "%')")
        or die(mysqli_error($link));

    if (mysqli_num_rows($raw_results) > 0) {
        while ($row = mysqli_fetch_assoc($raw_results)) {
            $results[] = $row;
        }
    }
}
?>


<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
    <a href="search.php">Clear Search</a>
</form>
<br>
<?php
  $sql2 = "SELECT * FROM products";
      $result = mysqli_query($link, $sql2);

      if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';
// Display results only if there are any
if (!empty($results)) {
    foreach ($results as $result) {
        echo '<div class="col-sm-4">';
          echo '  <div class="card" style="width: 18rem; margin: 5px;">';
		  echo '<img src="' . $result["product_img"] . '" class="card-img-top" alt="..." style="max-height: 150px;">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">'.$result["product_name"].'</h5>';
          echo '      <p class="card-text">'.$result["product_desc"].'</p>';
          echo '      <p class="card-text">Price: £'.$result["product_price"].'</p>';
          echo '      <a href="product_details.php?id='.$result["product_id"].'" class="btn btn-dark">Product details</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
    }
}
	  }
	  mysqli_close($link);
?>

</div>
</body>
</html>