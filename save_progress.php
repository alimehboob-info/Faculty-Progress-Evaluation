<?php
session_start();

// Check if the teacher's email, teacher_id, and subject_id are stored in the session
if (!isset($_SESSION['teacher_email']) || !isset($_SESSION['teacher_id']) || !isset($_SESSION['subject_id'])) {
    die("Teacher email, teacher ID, or subject ID not found in session!");
}

// Retrieve the teacher's email, teacher_id, and subject_id from the session
$email = $_SESSION['teacher_email'];
$teacherId = $_SESSION['teacher_id'];
$subjectId = $_SESSION['subject_id'];

try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "faculty";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $response = array();

    $progressData = isset($_POST["progressData"]) ? $_POST["progressData"] : null;

    if ($progressData) {
        foreach ($progressData as $cloId => $progress) {
            // Retrieve subject_name based on the subject_id
            $subjectName = null;

            $sql = "SELECT Subject_Name FROM subject_table WHERE Subject_ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $subjectId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $subjectName = $row["Subject_Name"];
            }

            if ($subjectName) {
                // Insert or update progress in clo_progress table
                $sql = "INSERT INTO clo_progress (teacher_id, subject_id, subject_name, clo_id, progress) 
                        VALUES (?, ?, ?, ?, ?) 
                        ON DUPLICATE KEY UPDATE progress = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iisiii", $teacherId, $subjectId, $subjectName, $cloId, $progress, $progress);
                if (!$stmt->execute()) {
                    throw new Exception($stmt->error);
                }
            }
        }

        $response["message"] = "Progress saved successfully!";
    } else {
        $response["message"] = "No progress data received!";
    }

    header("Content-Type: application/json");
    echo json_encode($response);

    $conn->close();
} catch (Exception $e) {
    error_log($e->getMessage());
    header("Content-Type: application/json");
    echo json_encode(["message" => $e->getMessage()]);
    exit();
}
