<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	include ( 'include/head.php' ) ;
	
	include('include/navbar.php'); 
	?>
</head>
<body>
   
    <br><br><br>
    <h2><b>Forgotten password</b></h2>
    <form action="forgot_password.php" method="post">
        <label for="email">Email address:</label>
        <input type="email address" id="email address" name="email address" placeholder="Enter email address" required><br><br>

        <input type="submit" value="Request Password Reset" onclick="showAlert();"><br><br>
        <hr>
		
<script type="text/javascript">
			function showAlert() {
				var emailInput = document.getElementById('email address');
				var emailValue = emailInput.value.trim();

				var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

				if (emailValue !== '' && emailRegex.test(emailValue)) {
					alert("Please check your inbox for reset instructions.");
				} else {
					alert("Please enter a valid email address.");
				}
			}
		</script>

        <div class="already-have-account">
            <a href="login.php">I REMEMBERED MY PASSWORD!</a>
        </div>
    </form><br>
    <?php include('include/footer.php'); ?>
</body>
</html>