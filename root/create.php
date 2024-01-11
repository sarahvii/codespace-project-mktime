<?php 

	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for product name .
  if ( empty( $_POST[ 'product_name' ] ) )
  { $errors[] = 'Enter the product name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'product_name' ] ) ) ; }

  # Check for a product description.
  if (empty( $_POST[ 'product_desc' ] ) )
  { $errors[] = 'Enter the product description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'product_desc' ] ) ) ; }
  
  # Check for a product image.
  if (empty( $_POST[ 'product_img' ] ) )
  { $errors[] = 'Enter the product image.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'product_img' ] ) ) ; }
  
  # Check for a product price.
  if (empty( $_POST[ 'product_price' ] ) )
  { $errors[] = 'Enter the product price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'product_price' ] ) ) ; }

	
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO products (product_name, product_desc, product_img, product_price) 
	VALUES ('$n','$d', '$img', '$p' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<p>New record created successfully</p>
		<a href="create.php">Add Records</a>  |  <a href="read.php">Read Records</a>  |  <a href="update.php">Update Record</a>  | <a href="delete.php">Delete Record</a>'; 
		}
  
    # Close database connection.
	
    mysqli_close($link); 

    exit();
  }
   
  # Or report errors.
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
 
	}
	}
?>


<!doctype html>
<html lang="en">
  <head>
<title>Create Product</title>
  </head>
  <body>
<form action="create.php" method="post" enctype="multipart/form-data">
  <label for="product_name">Name:</label>
  <input type="text" id="product_name" name="product_name" required value="<?php if (isset($_POST['product_name'])) echo $_POST['product_name']; ?> "> <br>
<br>
  <label for="product_desc">Description:</label>
  <input id="description" name="product_desc" required value="<?php if (isset($_POST['product_desc'])) echo $_POST['product_desc']; ?>"></textarea><br>
<br>
  <label for="product_img">Image URL:</label>
   <input type="text" id="imageURL" name="product_img" required value="<?php if (isset($_POST['product_img'])) echo $_POST['product_img']; ?>"><br>
<br>
<label for="product_price">Price:</label>
   <input type="text" id="price" name="product_price" min="0" step="0.01" required value="<?php if (isset($_POST['product_price'])) echo $_POST['product_price']; ?>"><br>
<br>
<input type="submit" value="Submit">
</form>
</body>
</html>