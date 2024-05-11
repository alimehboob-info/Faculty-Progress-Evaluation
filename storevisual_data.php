<?php
// Your database connection code here
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "Faculty";

// Create a database connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["completed"]) && is_array($_POST["completed"])) {
        $completedItems = $_POST["completed"];

        // Fetch the student ID from the session
        session_start();
        $studentId = $_SESSION['student_id'];

        // Flag to track if any records were successfully stored
        $success = false;

        // Iterate over each completed item
        foreach ($completedItems as $cloId => $item) {
            $progress = mysqli_real_escape_string($conn, $item['progress']);
            $completed = $item['completed'] === 'Accepted' ? 1 : 0;
            $status = $completed ? 'Accepted' : 'Remaining';

            // Insertion query
            $query = "INSERT INTO student_feedback (student_id, subject_id, clo_id, progress, completed, status) 
                      VALUES ('$studentId', (SELECT Subject_ID FROM subject_table WHERE Subject_Name = 'Visual Programming'), '$cloId', '$progress', '$completed', '$status')";

            if (mysqli_query($conn, $query)) {
                // Set success flag to true if at least one record is stored successfully
                $success = true;
            }
        }

        // Check if any records were successfully stored
        if ($success) {
            // Close the database connection
            mysqli_close($conn);

            // Show an alert message
            echo '<script>alert("Record Inserted Successfully");</script>';

            // Redirect to student_dashboard.php after clicking "OK" in the alert
            echo '<script>window.location.href = "student_dashboard.php";</script>';
        } else {
            echo "Error storing data: " . mysqli_error($conn);
        }
    } else {
        echo "No completed items selected.";
    }
}

// Close the database connection
mysqli_close($conn);
