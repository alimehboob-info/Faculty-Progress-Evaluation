<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['admin_email'])) {
    // Destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: admin_login.php");
exit();
