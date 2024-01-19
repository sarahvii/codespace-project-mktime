<?php
include "connect_db.php";

$sql = "SELECT * FROM products";
$r = @mysqli_query ( $link, $sql ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
	<style>
table{
  border: 1px solid black;
  border-spacing: 30px;
  
}
td {
  border-bottom: 1px solid #ddd;
}
</style>
</head>
<body>
    <h1>Product List</h1>
    <a href="create.php">Create Product</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>IMG URL</th>
            <th>Price</th>
        </tr>
		
  <?php
        while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
			echo'<tr>
			<td>'.$row['product_id'].' </td><td>'.$row['product_name'].' </td><td>'.$row['product_desc'].'</td><td><img src="'.$row['product_img'].'" alt="product" width="50"   height="50"></td><td>'.$row['product_price'].'</td><td><a href="delete.php?id='.$row['product_id'].'">Delete  | </a> <a href="update.php">Update</a></td>
				</tr>
			';
}
		
	
    # Close database connection.
    mysqli_close($link); 

    exit();
?>
</body>
</html> 