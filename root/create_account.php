<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
    <br><br>
    <h2><b>Create account</b></h2>
    <form action="create_account.php" method="post">

        <label for="Name">First Name:</label>
        <input type="name" id="name" name="name" placeholder="Enter first name" required><br>

        <label for="Name">Last Name:</label>
        <input type="name" id="name" name="name" placeholder="Enter last name" required><br>

        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br>

        <label for="password">Repeat Password:</label>
        <input type="password" id="password" name="password" placeholder="Repeat Password" required><br><br>

        <input type="submit" value="Create Account"><br><br>
        <hr>

        <div class="already-have-account">
            <a href="login.php">ALREADY HAVE AN ACCOUNT?</a></p>
        </div>
    </form>
</body>
</html>
