<?php


if (isset($_POST['delete-btn'])) {
    $stud_id = $_GET['id'];
    include "database/config.php";

    $query2 = "DELETE FROM `teacher_login` WHERE id={$stud_id}";
    $result2 = mysqli_query($conn, $query2) or die("failed");
    if ($result2) {
        $_SESSION["status"] = "Successfully deleted file";
        $_SESSION["status_code"] = "warning";
    } else {
        $_SESSION["status"] = "Failed to delete file";
        $_SESSION["status_code"] = "error";
    }

    mysqli_close($conn);

    header("Location: http://localhost/faculty/addteacher.php");
    exit(); // Make sure to exit after redirecting
}
