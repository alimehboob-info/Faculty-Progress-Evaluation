<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are present in the $_POST array
    if (isset($_POST['subject']) && isset($_POST['teacher'])) {
        $subjectId = $_POST['subject'];
        $teacherId = $_POST['teacher'];

        // Perform necessary validations before inserting the data into the database

        // Connect to the database (replace with your database credentials)
        $conn = new mysqli("localhost", "root", "", "faculty");

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the assigned subject data into the teacher_subject_assignment table
        $query = "INSERT INTO teacher_subject_assignment (teacher_id, subject_id) VALUES ('$teacherId', '$subjectId')";

        if ($conn->query($query) === TRUE) {
            echo "Assigned subject successfully.";
        } else {
            echo "Error assigning subject: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Subject and teacher fields are required.";
    }
} else {
    echo "Invalid request.";
}
