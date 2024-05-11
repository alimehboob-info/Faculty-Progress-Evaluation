<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['student_email'])) {
    header("Location: student_dashboard.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "faculty";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the entered email and password from the login form
    $email1 = $_POST['email'];
    $password1 = $_POST['password'];

    // Prepare and execute the SQL query to check if the credentials exist in the table
    $query = "SELECT * FROM student_login WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email1, $password1);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    // Check if the query returned a row, indicating successful login
    if ($result->num_rows == 1) {
        // Fetch the student's name
        $row = $result->fetch_assoc();
        $student_id = $row['id'];
        $student_name = $row['name'];

        // Set the student's name in the session variable
        $_SESSION['student_id'] = $student_id;
        $_SESSION['student_name'] = $student_name;

        // Redirect to the student dashboard
        header("Location: student_dashboard.php");
        exit();
    } else {
        // Login failed
        $error = "Invalid email or password";
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form Using Bootstrap 5</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="css/loginform1.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form action="student_login.php" method="post" class="rounded set shadow py-5 px-4">
                    <div class="logo">
                        <img decoding="async" src="images/isplogo.png" class="img-fluid" alt="Logo">
                    </div>
                    <h3 class="text-light fw-bolder fs-4 mb-2">Student Login</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label for="Password">Password</label>
                    </div>
                    <div class="mt-2 text-end">
                        <a href="#" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Login</button>

                    <a href="https://www.isp.edu.pk/" class="btn btn-light login_with w-100 mb-3 shadow">
                        <img decoding="async" alt="Logo" src="images/isplogo.png" class="img-fluid me-3">ISP
                        Official Site
                    </a>
                </form>
            </div>
        </div>
    </section>

</body>

</html>