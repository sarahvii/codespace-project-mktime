<!doctype html>
<html lang="en">
  <head>
	<?php session_start();
	include('include/head.php'); ?>
	
	<!-- navbar -->
	
		<?php include('navbar.php'); ?>
	
	
  </head>
  <body>
<div class="container">
  
  
  <!-- Content here -->
  <?php
  
  
        //connect to db
      $link = mysqli_connect('localhost','root','','mktime'); 
      if (!$link) { 
        die('Could not connect to MySQL: ' . mysqli_error()); 
      } 
      echo 'Connected to the database successfully!'; 

echo '<h3 class="text-center"> 
  <strong>Hello ' . (isset($_SESSION['firstname']) ? '' . $_SESSION['firstname'] : '') . ' and welcome to MK Time</strong><br>
  <small class="text-muted"><em>Watches for every wrist</em></small>
  <br>
</h3>';


      //fetch product data from db
      $sql = "SELECT * FROM products";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';

        // output data of each row into product card
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-sm-4">';
          echo '  <div class="card" style="width: 18rem; margin: 5px; transition: box-shadow 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.1)\'; this.style.transform=\'scale(1.05)\'" onmouseout="this.style.boxShadow=\'none\'; this.style.transform=\'none\'">';
		  echo '<img src="' . $row["product_img"] . '" class="card-img-top" alt="..." style="max-height: 150px;">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">'.$row["product_name"].'</h5>';
          echo '      <p class="card-text">'.$row["product_desc"].'</p>';
          echo '      <p class="card-text">Price: £'.$row["product_price"].'</p>';
          echo '      <a href="product_details.php?id='.$row["product_id"].'" class="btn btn-dark">Product details</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo "0 results";
      }
      mysqli_close($link);

  ?>
      </div>
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
  
</div>
<!-- End of .container -->
</div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>