<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
<div class="container">
    <?php
    // connect to the database
    $link = mysqli_connect('localhost', 'root', '', 'mktime');
    if (!$link) {
      die('Could not connect: ' . mysqli_error());
    }

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
      echo '<p>Price: $'.$row["product_price"].'</p>';
    } else {
      echo "Product not found.";
    }

    mysqli_close($link);
    ?>
  </div>
</body>
</html>