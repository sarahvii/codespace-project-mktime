<?php
# Access session.
session_start() ;
include('head.php');
include('navbar.php');
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Shopping Cart</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	</head>
  <body>
     <div class="container">
<?php
      // connect to db
      $link = mysqli_connect('localhost', 'root', '', 'mktime');
      if (!$link) {
        die('Could not connect to MySQL: ' . mysqli_error());
      }
      echo 'Connected to the database successfully!';

      echo '<h3 class="text-center"> 
          <strong>Hello ' . (isset($_SESSION['firstname']) ? '' . $_SESSION['firstname'] : '') . '. Here is your shopping basket.</strong><br>
          <br>
      </h3>';
		 mysqli_close($link);
      ?>
	</div>
	<?php include('footer.php'); ?>
	</body>
  </html>