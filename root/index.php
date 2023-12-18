<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
  <title>MK Time</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">MK Time</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="#">Pricing</a>
      <a class="nav-link disabled">Disabled</a>
      <a class="nav-link" href="\mktime\root\login.php">Login</a>
     
    </div>
  </div>
</nav>
<div class="container">
  <!-- Content here -->
  <?php
      echo'<h1 class="text-center">Hello, watch lover!</h1>';
      echo'<h2 class="text-center">Look at these shiny watches</h2>';

      //connect to db
      $link = mysqli_connect('localhost','root','','mktime'); 
      if (!$link) { 
        die('Could not connect to MySQL: ' . mysqli_error()); 
      } 
      echo 'Connected to the database successfully!'; 

      //fetch product data from db
      $sql = "SELECT * FROM products";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';

        // output data of each row into product card
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-sm-4">';
          echo '  <div class="card" style="width: 18rem;">';
          echo '    <img src="'.$row["product_img"].'" class="card-img-top" alt="...">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">'.$row["product_name"].'</h5>';
          echo '      <p class="card-text">'.$row["product_desc"].'</p>';
          echo '      <p class="card-text">Price: $'.$row["product_price"].'</p>';
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