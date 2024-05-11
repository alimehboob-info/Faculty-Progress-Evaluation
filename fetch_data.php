<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subjectID = $_GET['subjectID'];
$teacherID = $_GET['teacherID'];

// Fetch the data from the database based on the selected subject and teacher
$query = "SELECT subject_table.Subject_Name, clo_table.CLO_Title, clo_table.Subject_Counter, content_table.Content_Details
          FROM subject_table
          INNER JOIN clo_table ON subject_table.Subject_ID = clo_table.Subject_ID
          INNER JOIN content_table ON clo_table.CLO_ID = content_table.CLO_ID
          WHERE subject_table.Subject_ID = '$subjectID'
          AND clo_table.Subject_ID = '$subjectID'";

if (!empty($teacherID)) {
    $query .= " AND teacher_subject_assignment.teacher_id = '$teacherID'";
}

$result = $conn->query($query);

$responseData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $responseData[] = $row;
    }
}

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($responseData);

// Close the database connection
$conn->close();
