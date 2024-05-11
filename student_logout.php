<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['student_email'])) {
    // Destroy the session and unset session variables
    session_destroy();
    unset($_SESSION['teacher_email']);
    unset($_SESSION['teacher_id']);
    unset($_SESSION['subject_id']);
}

// Redirect to teacher_login.php
header("Location: student_login.php");
exit();
