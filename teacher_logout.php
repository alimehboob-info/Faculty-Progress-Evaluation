<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['teacher_email'])) {
    // Destroy the session and unset session variables
    session_destroy();
    unset($_SESSION['teacher_email']);
    unset($_SESSION['teacher_id']);
    unset($_SESSION['subject_id']);
}

// Redirect to teacher_login.php
header("Location: teacher_login.php");
exit();
