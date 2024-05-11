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

// Fetch subjects
$subjectQuery = "SELECT Subject_ID, Subject_Name FROM subject_table";
$subjectResult = $conn->query($subjectQuery);
$subjects = array();
if ($subjectResult->num_rows > 0) {
    while ($row = $subjectResult->fetch_assoc()) {
        $subjects[] = $row;
    }
}

// Fetch teachers
$teacherQuery = "SELECT id, name FROM teacher_login";
$teacherResult = $conn->query($teacherQuery);
$teachers = array();
if ($teacherResult->num_rows > 0) {
    while ($row = $teacherResult->fetch_assoc()) {
        $teachers[] = $row;
    }
}

// Prepare response data
$responseData = array(
    'subjects' => $subjects,
    'teachers' => $teachers
);

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($responseData);

// Close the database connection
$conn->close();
