<!--Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container-fluid p-3 pb-0 mx-auto">
    <!-- Section: Logo and Social Media Icons -->
    <section class="d-flex justify-content-between align-items-center" style="height: 40px;">
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
          <!-- Social media icons -->
        </ul>
      </div>
    </section>
    <hr>
    <!-- Section: Form-->
    <section class="text-center">
      <div class="row">
      <div class="col-md-4 col-12 mx-auto">
          <p> For exclusive personal experience visit us <br>
           <p>129 Bath St, Glasgow <br>
             G2 2SZ Lanarkshire <br>
            Scotland </p>
            </div>
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
          <button type="submit" id="newsletter-submit" class="btn btn-outline-light mb-4" onclick="showMailingListAlert();">
            Subscribe
            </button>
        </div>
		  <script type="text/javascript">
          function showMailingListAlert() {
            var emailInput = document.getElementById('form5Example2');
            var emailValue = emailInput.value.trim();

            // Regular expression for email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailValue !== '' && emailRegex.test(emailValue)) {
              alert("You have successfully signed up to our mailing list. Please check your inbox.");
            } else {
              alert("Please enter a valid email address.");
            }
          }
        </script>
        <div class="col-md-4 col-12 mx-auto">
          <p> Contact Us </p>
          <p> email: mktime@gmail.com </p>
            <p> call: 0141 9496 0865  </p>
            <p>  </p>
        </div>
      </div>
    </section>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © Copyright MKTime 2023. All rights reserved
  </div>
</footer>

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
 