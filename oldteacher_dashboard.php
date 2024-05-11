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

// Retrieve the submitted email and password
$email = $_POST["email"];
$password = $_POST["password"];

// Perform a query to check the login credentials
$sql = $sql = "SELECT teacher_login.name, subject_table.Subject_Name, clo_table.CLO_Title, clo_table.Subject_Counter, content_table.Content_Details
        FROM teacher_login
        JOIN teacher_subject_assignment ON teacher_login.id = teacher_subject_assignment.teacher_id
        JOIN subject_table ON teacher_subject_assignment.subject_id = subject_table.Subject_ID
        JOIN clo_table ON subject_table.Subject_ID = clo_table.Subject_ID
        JOIN content_table ON clo_table.CLO_ID = content_table.CLO_ID
        WHERE teacher_login.email = '$email' AND teacher_login.password = '$password'";


$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Display the assigned subject details
    echo "<h1>Assigned Subject Details:</h1>";

    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>Subject Name</th>
                    <th>CLO Title</th>
                    <th>Subject Counter</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["Subject_Name"] . "</td>
                <td>" . $row["CLO_Title"] . "</td>
                <td>" . $row["Subject_Counter"] . "</td>
                <td>" . $row["Content_Details"] . "</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Invalid email or password.";
}

$conn->close();
