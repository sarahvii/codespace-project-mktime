<?php
# Access session.
session_start();

# Get the current script name.
$current_page = basename($_SERVER['PHP_SELF']);

# Define list of pages that don't require login.
$public_pages = ['index.php', 'login.php', 'product_details.php'];

# Redirect if not logged in, not on a public page, and not already on the login page.
if (!isset($_SESSION['user_id']) && !in_array($current_page, $public_pages)) {
    require('login_tools.php');
    load();
}