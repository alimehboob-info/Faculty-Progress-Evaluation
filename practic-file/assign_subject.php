<?php
// Connect to the database
$host = 'localhost';
$dbname = 'faculty';
$username = 'root';
$password = '';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$subjectID = $_POST['subject'];
$cloID = $_POST['clo'];
$teacherID = $_POST['teacher'];

// Insert the assignment into the database
$query = "INSERT INTO assignment_table (Subject_ID, CLO_ID, Teacher_ID) VALUES ($subjectID, $cloID, $teacherID)";
if (mysqli_query($conn, $query)) {
    echo "Subject assigned successfully";
} else {
    echo "Error occurred while assigning subject: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
