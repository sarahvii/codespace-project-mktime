<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    session_start();
    include('include/head.php');
    include('navbar.php');
    ?>
  </head>

  <body>
    <div class="container">
	 <form action="index.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
        <a href="index.php">Clear Search</a>
      </form>
      <br>
      <?php
      // connect to db
      $link = mysqli_connect('localhost', 'root', '', 'mktime');
      if (!$link) {
        die('Could not connect to MySQL: ' . mysqli_error());
      }
      echo 'Connected to the database successfully!';

      echo '<h3 class="text-center"> 
          <strong>Hello ' . (isset($_SESSION['firstname']) ? '' . $_SESSION['firstname'] : '') . ' and welcome to MK Time</strong><br>
          <small class="text-muted"><em>Watches for every wrist</em></small>
          <br>
      </h3>';

      // Initialize $results variable
      $results = array();

      // Check if search form is submitted
      if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $query = mysqli_real_escape_string($link, $query);
		
	        $raw_results = mysqli_query($link, "SELECT * FROM `products`
            WHERE (`product_name` LIKE '%" . $query . "%') 
            OR (`product_desc` LIKE '%" . $query . "%')
            OR (`key_features` LIKE '%" . $query . "%')")
          or die(mysqli_error($link));

        if (mysqli_num_rows($raw_results) > 0) {
          while ($row = mysqli_fetch_assoc($raw_results)) {
             echo '<div class="col-sm-4">';
            echo '  <div class="card" style="width: 18rem; margin: 5px; transition: box-shadow 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.1)\'; this.style.transform=\'scale(1.05)\'" onmouseout="this.style.boxShadow=\'none\'; this.style.transform=\'none\'">';
            echo '<img src="' . $row["product_img"] . '" class="card-img-top" alt="..." style="max-height: 150px;">';
            echo '    <div class="card-body">';
            echo '      <h5 class="card-title">' . $row["product_name"] . '</h5>';
            echo '      <p class="card-text">' . $row["product_desc"] . '</p>';
            echo '      <p class="card-text">Price: £' . $row["product_price"] . '</p>';
            echo '      <a href="product_details.php?id=' . $row["product_id"] . '" class="btn btn-dark">Product details</a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          }
        }
      } else {
        // If no search, get all products
        $sql2 = "SELECT * FROM products";
	  $result = mysqli_query($link, $sql2);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="row">';
          // Fetch and display all products
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-4">';
             echo '  <div class="card" style="width: 18rem; margin: 5px; transition: box-shadow 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.1)\'; this.style.transform=\'scale(1.05)\'" onmouseout="this.style.boxShadow=\'none\'; this.style.transform=\'none\'">';
            echo '<img src="' . $row["product_img"] . '" class="card-img-top" alt="..." style="max-height: 150px;">';
            echo '    <div class="card-body">';
            echo '      <h5 class="card-title">' . $row["product_name"] . '</h5>';
            echo '      <p class="card-text">' . $row["product_desc"] . '</p>';
            echo '      <p class="card-text">Price: £' . $row["product_price"] . '</p>';
            echo '      <a href="product_details.php?id=' . $row["product_id"] . '" class="btn btn-dark">Product details</a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          }
        }
      }

      mysqli_close($link);
      ?>
    </div>
  </body>
</html>
