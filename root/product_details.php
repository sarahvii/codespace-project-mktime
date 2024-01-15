<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include('include/head.php'); 
    include('include/navbar.php');
	?>
</head>
<body>
<div class="container">
    <?php
    // connect to the database
    $link = mysqli_connect('localhost', 'root', '', 'mktime');
    if (!$link) {
      die('Could not connect: ' . mysqli_error());
    }

    // get product ID from URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // fetch product details
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      echo '<h1>'.$row["product_name"].'</h1>';
      echo '<img src="'.$row["product_img"].'" alt="Product Image" style="width:100%;max-width:300px;">';
      echo '<p>'.$row["product_desc"].'</p>';
      echo '<p>'.$row["key_features"].'</p>';
	  echo '<p>Price: £'.$row["product_price"].'</p>';
    } else {
      echo "Product not found.";
    }

    mysqli_close($link);
    ?>
  </div>

  <!--Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container-fluid p-3 pb-0 mx-auto">
    <!-- Section: Logo and Social Media Icons -->
    <section class="d-flex justify-content-between align-items-center">
      <!-- Logo -->
      <div class="aero-footer-navigation-container">
        <a href="http://localhost/mktime/root/index.php#" title="MKTime">
          <img src="img/mktime.png" alt="MKTime" width="250" height="71" loading="lazy" class="" />
        </a>
      </div>
      <!-- Social Media Icons -->
      <div class="aero-socials">
        <ul class="aero-social__list list-unstyled flex items-center space-x-4">
          <li class="aero-social__list-item flex items-center rounded hover:opacity-75">
            <a href="#" class="aero-social__list-link inline-block p-2" target="_blank" rel="noopener">
              <img class="aero-social" src="img/facebook.jpg" width="25" height="25" loading="lazy" class="">
              <img class="aero-social" src="img/insta.jpg" width="25" height="25" loading="lazy" class="">
            </a>
          </li>
          <!-- Add more social media icons as needed -->
        </ul>
      </div>
    </section>
    <hr>
    <!-- Section: Form-->
    <section class="text-center">
      <div class="row">
        <div class="col-md-4 col-12 mx-auto">
          <!-- Sign up text -->
          <p class="pt-2">
            <strong>Sign up for our newsletter</strong>
          </p>
          <!-- Email input -->
          <div class="form-outline form-white mb-4">
            <input type="email" id="form5Example2" class="form-control" placeholder="Email address"/>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-outline-light mb-4">
            Subscribe
          </button>
        </div>
      </div>
    </section>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © Copyright MKTime 2023. All rights reserved
  </div>
</footer>
</body>
</html>