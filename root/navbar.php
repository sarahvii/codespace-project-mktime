
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="#"><img src="img/mktime.png" alt="MKTime" background-color="#001f3f" width="250" height="71" loading="lazy" class="" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
			<?php
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                // Display logout link
                echo '<a class="nav-link" href="session-cart.php">Shopping Basket</a><br>
					  <a class="nav-link" href="order_history.php">Order History</a><br>	  
					  <a class="nav-link" href="logout.php">Logout</a>';
            } else {
                // Display login link
                echo '<a class="nav-link" href="login.php">Login</a>';
            }
            ?>
        </div>
		
    </div>
</nav>