<?php
// php code of used with jquery ajax to fetch record
include "database/config.php";
if (isset($_POST['checking_edit_btn'])) {
    $s_id = $_POST['student_id'];
    $result_array = [];
    $query = "SELECT * FROM student_login WHERE id = $s_id";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            array_push($result_array, $row);
        }
        // this is always used out of loop scop
        header('Content-Type: application/json');
        echo json_encode($result_array);
    } else {
        echo "<h3>No record found</h3>";
    }
}
// php code of update record 
if (isset($_POST['update_student'])) {
    $s_id = $_POST['id'];
    $name1 = $_POST['name'];
    $email1 = $_POST['email'];

    // Perform the update query
    $query1 = "UPDATE student_login SET name='$name1', email='$email1' WHERE id='$s_id'";
    $result1 = mysqli_query($conn, $query1);
    // when recod is update animated alert start
    if ($result1) {
        $_SESSION["status"] = "Successfully";
        $_SESSION["status_code"] = "success";
        header("Location: http://localhost/faculty/add_student.php");
        exit(); // Make sure to exit after redirecting
    } else {
        $_SESSION["status"] = "Failed";
        $_SESSION["status_code"] = "error";
    }
}
