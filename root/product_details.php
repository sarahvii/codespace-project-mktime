<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
    <title>Product Details</title>
    <?php 
    include('include/head.php'); 
    include('navbar.php'); ?>
   
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
      echo '<img id="myImg" src="'.$row["product_img"].'" alt="'.$row["product_name"].'" style="width:100%;max-width:300px;">';
      echo '<p>'.$row["product_desc"].'</p>';
      echo '<p>Price: £'.$row["product_price"].'</p>';
    } else {
      echo "Product not found.";
    }

    mysqli_close($link);
    ?>
  </div>

    <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


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