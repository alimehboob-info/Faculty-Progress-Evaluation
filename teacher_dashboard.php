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

// Helper function to get the count of content for a specific CLO
function getCountOfContentForCLO($conn, $cloId)
{
    $sql = "SELECT COUNT(*) as count FROM content_table WHERE CLO_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cloId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["count"];
    }

    return 0;
}

// Retrieve the submitted email and password
$email = $_POST["email"];
$password = $_POST["password"];


// Perform a query to check the login credentials
// Perform a query to check the login credentials
$sql = "SELECT teacher_login.id, teacher_login.name, subject_table.Subject_ID, subject_table.Subject_Name, clo_table.CLO_ID, clo_table.CLO_Title, clo_table.Subject_Counter, content_table.Content_Details
        FROM teacher_login
        JOIN teacher_subject_assignment ON teacher_login.id = teacher_subject_assignment.teacher_id
        JOIN subject_table ON teacher_subject_assignment.subject_id = subject_table.Subject_ID
        JOIN clo_table ON subject_table.Subject_ID = clo_table.Subject_ID
        JOIN content_table ON clo_table.CLO_ID = content_table.CLO_ID
        WHERE teacher_login.email = ? AND teacher_login.password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Teacher login successful
    $row = $result->fetch_assoc();

    // Store teacher's email, teacher_id, and subject_id in the session
    session_start();
    $_SESSION['teacher_email'] = $email;
    $_SESSION['teacher_id'] = $row['id'];
    $_SESSION['subject_id'] = $row['Subject_ID'];

    // ...the rest of your code
} else {
    die("Invalid email or password!");
}









// Initialize array for storing total CLO counts and colors
$totalCLOCount = [];
$progressBarColors = [
    1 => 'bg-primary',
    2 => 'bg-success',
    3 => 'bg-info',
    4 => 'bg-warning',
    5 => 'bg-danger',
];

?>

<!-- ...HTML content... -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="css/teacher-dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- add other styles and scripts here -->
    <style>
        .headercolor {
            background: #11101D;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">
                    ISP Multan
                </div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Table </span>
                </a>
                <span class="tooltip">Table</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li>
                <a href="teacher_logout.php">
                    <i class='bx bx-lock'></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
        <div class="content">
            <div class="user">
                <div class="user_details">
                    <img decoding="async" src="images/admin.jpg" alt="">
                    <div class="name_job">
                        <div class="name">Teacher Name</div>
                        <div class="job">Subject </div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="text text-center">Teacher Dashboard</div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow bg-white">
                        <div class="card-header headercolor">
                            Assigned Subject Details
                        </div>
                        <div class="card-body bg-white p-0">

                            <?php
                            if ($result->num_rows > 0) {
                                echo "<table class='table table-striped table-bordered table-font'>
                            <thead class='headercolor table-font text-center'>
                            <tr>
                                <th>Mark Complete</th>
                                <th>Subject Name</th>
                                <th>CLO Title</th>
                                <th>CLO No</th>
                                <th>Content</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>";

                                while ($row = $result->fetch_assoc()) {
                                    $id = 'toggle_' . uniqid(); // Generate unique ID for each toggle
                                    $cloNo = $row["Subject_Counter"]; // CLO number
                                    $contentCount = getCountOfContentForCLO($conn, $row["CLO_ID"]); // Function to get the count of content for the CLO

                                    if (!isset($totalCLOCount[$cloNo])) {
                                        $totalCLOCount[$cloNo] = 0;
                                    }

                                    $totalCLOCount[$cloNo] += $contentCount;

                                    echo "<tr>
                                    
                <td>
                
                    <div class='custom-control custom-switch'>
                     <input class='custom-control-input' type='checkbox' id='$id' onclick='updateProgress(this, $contentCount, $cloNo)'>   
                        <label class='custom-control-label' for='$id'></label>
                    </div>
                </td>
                <td>" . $row["Subject_Name"] . "</td>
                <td>" . $row["CLO_Title"] . "</td>
                <td>" . $cloNo . "</td>
                <td>" . $row["Content_Details"] . "</td>
                <td class='align-middle'>
                    <div class='progress shadow '>
                        <div class='progress-bar " . $progressBarColors[$cloNo] . "' id='progress_$id' role='progressbar' style='width: 0%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>0%</div>
                    </div>
                </td>
            </tr>";
                                }

                                echo "</tbody>
                        </table>";

                                // Print overall progress bars for each CLO
                                // Print overall progress bars for each CLO
                                foreach ($totalCLOCount as $cloNo => $totalCount) {
                                    echo "<div class='mt-3'>
        <h5 class='table-font'>CLO $cloNo Overall Progress</h5>
        <div class='progress' data-name='CLO$cloNo'>
            <div class='progress-bar progress-bar-striped shadow  " . $progressBarColors[$cloNo] . "' id='overall-progress-$cloNo' role='progressbar' style='width: 0%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>No Completed</div>
        </div>
    </div>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </div>
                        <button class="btn btn-primary mt-3 shadow" id="submitBtn">Submit</button>
                        <!-- ...HTML content... -->

                        <script>
                            var totalCLOCount = <?php echo json_encode($totalCLOCount); ?>;
                            var completedCLOCount = {};

                            Object.keys(totalCLOCount).forEach(function(cloNo) {
                                completedCLOCount[cloNo] = 0;
                            });

                            function updateProgress(checkbox, contentCount, cloNo) {
                                var progressBarId = '#progress_' + checkbox.id;
                                var overallProgressBarId = '#overall-progress-' + cloNo;
                                if (checkbox.checked) {
                                    $(progressBarId).css('width', '100%').attr('aria-valuenow', '100').text('completed');
                                    completedCLOCount[cloNo] += contentCount;
                                } else {
                                    $(progressBarId).css('width', '0%').attr('aria-valuenow', '0').text('0%');
                                    completedCLOCount[cloNo] -= contentCount;
                                }
                                var overallProgress = (completedCLOCount[cloNo] / totalCLOCount[cloNo]) * 100;
                                $(overallProgressBarId).css('width', overallProgress + '%').attr('aria-valuenow', overallProgress).text(overallProgress.toFixed(0) + '%');
                            }

                            $("#submitBtn").on("click", function() {
                                var progressData = {};
                                Object.keys(totalCLOCount).forEach(function(cloNo) {
                                    var overallProgressBarId = '#overall-progress-' + cloNo;
                                    var progress = $(overallProgressBarId).attr('aria-valuenow');
                                    progressData[cloNo] = parseInt(progress);
                                });

                                $.post("save_progress.php", {
                                        progressData: progressData
                                    }, function(response) {
                                        alert(response.message);
                                    }, "json")
                                    .fail(function(jqXHR, textStatus, errorThrown) {
                                        console.error(jqXHR.responseText);
                                    });
                            });
                        </script>


                        <script src="js/teacher_dash.js"></script>
</body>

</html>