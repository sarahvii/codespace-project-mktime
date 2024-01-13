<?php
	#Read session start file.
	include ('include/session-cart.php');

	# Open database connection.
	require ( 'connect_db.php' );
	echo '<div class="row">';	
	# Retrieve items from 'products' database table.
	$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
	# Display body section.
	
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '
    <div class="col-md-3 d-flex justify-content-center">
	 <div class="card" style="width: 18rem;">
	  <img src="'. $row['product_img'].'" class="card-img-top" alt="'. $row['product_name'].'">
	   <div class="card-body text-center">
		<h5 class="card-title">'. $row['product_name'].'</h5>
		<p class="card-text">'. $row['product_desc'].'</p>
	 </div>
	  <div class="card-footer bg-transparent border-dark text-center">
		<p class="card-text">&pound '. $row['product_price'].'</p>
	  </div>
	  <div class="card-footer text-muted">
		<a href="added.php?id='.$row['product_id'].'" class="btn btn-info btn-block">Add to Cart</a>
	   </div>
	  </div>
	</div>  
	';
	}
	echo '</div>';
	# Close database connection.
	mysqli_close( $link) ; 
	}
	# Or display message.
	else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
	
	include ('include/footer.php');
?>	

	