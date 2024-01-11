<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['product_name'];
	$description = $_POST['product_desc'];
	$imageURL = $_POST['product_img'];
	$price = $_POST['product_price'];
	
	// do something with the form data, such as storing it in a database or sending an email
	
	echo "Thank you for submitting the form!";
} else {
	// the form wasn't submitted properly
	echo "There was an error submitting the form.";
}
?>