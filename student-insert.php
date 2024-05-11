<!-- code to check email exist -->
<?php
if (isset($_POST['insert-teacher-btn'])) {
    $teacher_name = $_POST["teachername"];
    $teacher_email = $_POST["teacheremail"];
    $teacher_password = $_POST["teacherpassword"];
    include_once "database/config.php";

    $checkQuery = "SELECT COUNT(*) as count FROM student_login WHERE email = '{$teacher_email}'";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkRow = mysqli_fetch_assoc($checkResult);
    $emailExists = $checkRow['count'] > 0;
    //  if email exist then show animated alert and not record insert to DB
    if ($emailExists) {
        $_SESSION["status"] = "Email already exists";
        $_SESSION["status_code"] = "error";
        header("Location: http://localhost/faculty/add_student.php");
    } else {
        // Insert the record into the database
        $insertQuery = "INSERT INTO student_login(`name`, `email`, `password`) VALUES 
        ('{$teacher_name}','{$teacher_email}','{$teacher_password}')";
        $insertResult = mysqli_query($conn, $insertQuery);
        //   insert record to DB with Animated Alert 
        if ($insertResult) {
            $_SESSION["status"] = "Successfully";
            $_SESSION["status_code"] = "success";
            header("Location: http://localhost/faculty/add_student.php");
            exit(); // Make sure to exit after redirecting
        } else {
            $_SESSION["status"] = "Failed";
            $_SESSION["status_code"] = "error";
        }
    }

    mysqli_close($conn);
}
?>
<!-- common code to insert record with animated alert  -->
// $query = "INSERT INTO teacher_login( `name`, `email`, `password`) VALUES
// ('{$teacher_name}','{$teacher_email}','{$teacher_password}')";
// $result = mysqli_query($conn, $query) or die("Query Unsuccessful.");
// if ($result) {
// $_SESSION["status"] = "Successfully";
// $_SESSION["status_code"] = "success";
// header("Location: http://localhost/faculty/addteacher.php");
// } else {
// $_SESSION["status"] = "Failed ";
// $_SESSION["status_code"] = "error";
// }
// mysqli_close($conn);
<!-- common code to insert record with animated alert  -->