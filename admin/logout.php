<?php
// Handle User Logout
require '../functions.php';

// Define the redirection page after logout
$indexPage = '../index.php';

// Call the logout function to end the session and redirect
logout($indexPage);
?>
