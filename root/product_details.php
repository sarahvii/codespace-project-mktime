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
    <?php
    // connect to the database
    require('connect_db.php');

    // get product ID from URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // fetch product details
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      echo '<h1>'.$row["product_name"].'</h1>
      <img src="'.$row["product_img"].'" alt="Product Image" style="width:100%;max-width:300px; margin-bottom: 15px;">
      <p>'.$row["product_desc"].'</p>
     <p>Features: '.$row["key_features"].'</p>
	 <p>Price: £'.$row["product_price"].'</p>
    <a href="added.php?id='.$row['product_id'].'" class="btn btn-primary" style="margin-bottom: 5px;">Add to Cart</a>
	<br>';
    } else {
      echo "Product not found.";
    }

    mysqli_close($link);
    ?>
  </div>
  <?php include('include/footer.php'); ?>
</footer>
</body>
</html>