<?php
// Include the necessary functions
require '../functions.php';

// Redirect page after logout
$indexPage = '../index.php';

// Destroy the session to log out the user
logout($indexPage);

// Function to log out user and destroy session
function logout($redirectPage) {
    // Start the session if it's not already started
    session_start();

    // Unset all session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();

    // Redirect to the specified page (e.g., homepage or login page)
    header("Location: $redirectPage");
    exit();
}
?>
