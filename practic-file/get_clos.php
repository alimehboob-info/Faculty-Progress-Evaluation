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

// Get the subject ID from the request
$subjectID = $_GET['subject'];

// Fetch all CLOs for the selected subject
$query = "SELECT CLO_ID, CLO_Title FROM clo_table WHERE Subject_ID = $subjectID";
$result = mysqli_query($conn, $query);

// Fetch the CLOs and store them in an array
$clos = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $clos[] = $row;
    }
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($clos);

// Close the connection
mysqli_close($conn);
