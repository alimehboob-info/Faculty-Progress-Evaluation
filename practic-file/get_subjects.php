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

// Fetch all subjects
$query = "SELECT Subject_ID, Subject_Name FROM subject_table";
$result = mysqli_query($conn, $query);

// Fetch the subjects and store them in an array
$subjects = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
    }
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($subjects);

// Close the connection
mysqli_close($conn);
