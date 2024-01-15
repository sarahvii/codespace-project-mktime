<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('include/head.php'); ?>
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
	
	</body>
  </html>