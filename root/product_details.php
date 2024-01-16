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
      echo '<h1>'.$row["product_name"].'</h1>';
      echo '<img src="'.$row["product_img"].'" alt="Product Image" style="width:100%;max-width:300px;">';
      echo '<p>'.$row["product_desc"].'</p>';
      echo '<p>'.$row["key_features"].'</p>';
	  echo '<p>Price: £'.$row["product_price"].'</p>';
    echo '<a href="added.php?id='.$row['product_id'].'" class="btn btn-primary">Add to Cart</a>';
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