<?php
// Connect to the database
$host = 'localhost';
$dbname = 'faculty';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement to fetch all teachers
    $stmt = $conn->prepare('SELECT id, name FROM teacher_login');
    $stmt->execute();

    // Fetch the teachers and store them in an array
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($teachers);
} catch (PDOException $e) {
    // Handle database errors
    echo 'Error: ' . $e->getMessage();
}
