<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="styles.css">
     <title>MK Time</title>
	 <!-- navbar -->
	
		<?php include('navbar.php'); ?>
</head>
<body>
   
    <br><br><br>
    <h2><b>Forgotten password</b></h2>
    <form action="forgot_password.php" method="post">
        <label for="email">Email address:</label>
        <input type="email address" id="email address" name="email address" placeholder="Enter email address" required><br><br>

        <input type="submit" value="Request password reset"><br><br>
        <hr>

        <div class="already-have-account">
            <a href="login.php">I REMEMBERED MY PASSWORD!</a>
        </div>
    </form><br>
    <?php include('include/footer.php'); ?>
</body>
</html>