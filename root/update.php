<?php
# Check form submitted.	
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  #Connect to the database.
  require ('connect_db.php'); 

  #Initialize an error array.
  $errors = array();

# Check for id.
  if ( empty( $_POST[ 'product_id' ] ) )
  { $errors[] = 'Update product ID' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'product_id' ] ) ) ; }
  
  # Check for name.
  if ( empty( $_POST[ 'product_name' ] ) )
  { $errors[] = 'Update product name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'product_name' ] ) ) ; }

  # Check for description
  if (empty( $_POST[ 'product_desc' ] ) )
  { $errors[] = 'Update description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'product_desc' ] ) ) ; }

# Check for image URL.
  if (empty( $_POST[ 'product_img' ] ) )
  { $errors[] = 'Update image URL.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'product_img' ] ) ) ; }

# Check for price.
  if (empty( $_POST[ 'product_price' ] ) )
  { $errors[] = 'Update price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'product_price' ] ) ) ; }
  
  # Update the record in the database
  {
    $q = "UPDATE products SET product_id='$id',product_name='$n', product_desc='$d', product_img='$img', product_price='$p'  WHERE product_id='$id'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: read.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
  
       # Close database connection.
    
	mysqli_close($link); 
    exit();
  }
 mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
	<script type ="text/JavaScript">
	alert("' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</script>';
  } 
?>

<!doctype html>
<html lang="en">

  <head>
<title>Update Product</title>
  </head>
  
  <body>
<form action="update.php" method="post">
  <label for="product_id">Update product ID</label>
  <input type="text" name="product_id" value="<?php if (isset($_POST['product_id'])) echo $_POST['product_id']; ?>"> 
 <br>
  <label for="product_name">Update product Name</label>
  <input type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) echo $_POST['product_name']; ?>"> 
 <br>
  <label for="product_desc">Update product Description</label>
  <input type="text" name="product_desc" value="<?php if (isset($_POST['product_desc'])) echo $_POST['product_desc']; ?>">
 <br>
  <label for="product_img">Update product Image</label>
  <input type="text" name="product_img" value="<?php if (isset($_POST['product_img'])) echo $_POST['product_img']; ?>">
 <br>
  <label for="product_desc">Update product Price</label>
  <input type="text" name="product_price" value="<?php if (isset($_POST['product_price'])) echo $_POST['product_price']; ?>">
 <br>
  <input type="submit" value="Update Record"></p>
</form>
<!-- closing form -->
 <br>
 		<a href="create.php">Add Records</a>  |  <a href="read.php">Read Records</a>  |  <a href="update.php?id='.$row['product_id'].'">Update Record</a>  | <a href="delete.php?id='.$row['product_id'].'">Delete Record</a>

  </body>
</html>