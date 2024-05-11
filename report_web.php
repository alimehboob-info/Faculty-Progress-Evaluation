<?php
// Your database connection code here
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "Faculty";

// Create a database connection
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Faculty Progress Evaluation
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/student.css" />
</head>

<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <img decoding="async" loading="lazy" src="images/isplogo.png" alt="..." width="100" height="100" class="mr-0 rounded-circle img-thumbnail " />
                <div class="media-body">
                    <h4 class="m-0">Admin</h4>
                    <p class="font-weight-normal text-muted mb-0">ISP Multan</p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">
            Dashboard
        </p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-dark bg-light">
                    <span> <i class="fa-solid fa-house mr-3 text-primary fa-fw"></i>
                        Home</span><span><i class="fa-solid fa-angle-right arrow1"></i>
                    </span>
                </a>

            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <span><i class="fa-solid fa-address-card  mr-3 text-primary fa-fw"></i>
                        Add Student</span><span><i class="fa-solid fa-angle-right arrow2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="addteacher.php" class="nav-link text-dark">
                    <span><i class="fa-solid fa-user  mr-3 text-primary fa-fw"></i> Add Teacher</span><span>
                        <i class="fa-solid fa-angle-right arrow3"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="cloadd.php" class="nav-link text-dark">
                    <span><i class="fa fa-book mr-3 text-primary fa-fw" aria-hidden="true"></i>
                        Add CLO</span><span>
                        <i class="fa-solid fa-angle-right arrow4"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="assign.php" class="nav-link text-dark">
                    <span><i class="fa fa-check-circle mr-3 text-primary fa-fw" aria-hidden="true"></i></span>
                    Assign CLO
                    <span>
                </a>
            </li>
            <li class="nav-item">
                <a href="set_admin_subject.php" class="nav-link text-dark">
                    <i class="fa-solid fa-file-powerpoint mr-3 text-primary fa-fw"></i>
                    Report
                </a>
            </li>
            <li class="nav-item">
                <a href="admin_logout.php" class="nav-link text-dark">
                    <i class="fa-solid fa-right-to-bracket fa-beat-fade mr-3 text-primary fa-fw"></i>
                    logout
                </a>
            </li>
        </ul>


    </div>
    <!-- End vertical navbar -->
    <!-- Page TOP content holder -->
    <div class="page-content p-5">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
            <i class="fa-solid fa-bars mr-2" style="color: #292a2d;"></i><small class="text-uppercase font-weight-bold"></small>
        </button>
        <div class="show ">
            <h5 class="heading">ADMIN</h5>
            <img src="images/admin.jpg" class="rounded-circle img-thumbnail" alt="">
        </div>
    </div>
    <!-- page top content end -->
    <div class="container clearfix content-subhead">
        <div class="row main-sub ">
            <div class="col-12 subhead1">
                <h3>Faculty Progress Evaluation</h3>
            </div>
        </div>
    </div>
    <hr>
    <!-- inside card creat form start  -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 addteachermargin">
                <!-- card start -->
                <div class="card shadow">

                    <!-- second card-heading inside card start -->
                    <h5 class="card-header addheadercolor ">Teacher Report</h5>
                    <div class="card-body bg-white">

                        <!-- table start -->
                        <table class="table table-striped table-bordered table-font">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>CLO ID</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP code to fetch and display the data -->
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

                                // SQL query to fetch data
                                $sql = "SELECT tl.name AS Teacher_Name, st.Subject_Name, cp.clo_id, cp.progress
                            FROM clo_progress cp
                            JOIN teacher_login tl ON cp.teacher_id = tl.id
                            JOIN subject_table st ON cp.subject_id = st.Subject_ID
                            WHERE st.Subject_Name = 'Web Engineering'";

                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    die("Query failed: " . mysqli_error($conn));
                                }

                                // Display the fetched data in the table rows
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $progress = $row['progress'];
                                        echo "<tr>";
                                        echo "<td>" . $row['Subject_Name'] . "</td>";
                                        echo "<td>" . $row['Teacher_Name'] . "</td>";
                                        echo "<td>" . $row['clo_id'] . "</td>";
                                        echo "<td class='align-middle'><div class='progress'><div class='progress-bar' role='progressbar' style='width: $progress%;' aria-valuenow='$progress' aria-valuemin='0' aria-valuemax='100'>$progress%</div></div></td>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No data found.</td></tr>";
                                }

                                // Close the database connection
                                ?>
                                <!-- End of PHP code -->
                            </tbody>


                        </table>
                        <!-- model box start----- -->

                    </div>
                </div>
                <div class="card shadow">

                    <!-- second card-heading inside card start -->
                    <h5 class="card-header addheadercolor ">students Feedback For Each CLO Number</h5>
                    <div class="card-body bg-white">

                        <!-- table start -->
                        <table class="table table-striped table-bordered table-font">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>CLO</th>
                                    <th>Accepted</th>
                                    <th>Remaining</th>
                                    <th>Total Feedback</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- Query to retrieve the subject and CLO information -->
                                <?php
                                $subjectName = "Web Engineering";

                                $subjectQuery = "SELECT st.Subject_Name, ct.CLO_ID, ct.Subject_ID
                         FROM subject_table st
                         JOIN clo_table ct ON st.Subject_ID = ct.Subject_ID
                         WHERE st.Subject_Name = '$subjectName'";

                                $subjectResult = mysqli_query($connection, $subjectQuery);

                                while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
                                    $subject = $subjectRow['Subject_Name'];
                                    $cloID = $subjectRow['CLO_ID'];
                                    $subjectID = $subjectRow['Subject_ID'];

                                    // Query to count the number of students with status 'Accepted'
                                    $acceptedQuery = "SELECT COUNT(*) AS AcceptedCount
                              FROM student_feedback
                              WHERE subject_id = '$subjectID' AND clo_id = '$cloID' AND status = 'Accepted'";

                                    $acceptedResult = mysqli_query($connection, $acceptedQuery);
                                    $acceptedCount = mysqli_fetch_assoc($acceptedResult)['AcceptedCount'];

                                    // Query to count the number of students with status 'Remaining'
                                    $remainingQuery = "SELECT COUNT(*) AS RemainingCount
                               FROM student_feedback
                               WHERE subject_id = '$subjectID' AND clo_id = '$cloID' AND status = 'Remaining'";

                                    $remainingResult = mysqli_query($connection, $remainingQuery);
                                    $remainingCount = mysqli_fetch_assoc($remainingResult)['RemainingCount'];

                                    // Query to count the total number of students who gave feedback
                                    $totalFeedbackQuery = "SELECT COUNT(*) AS TotalFeedbackCount
                                   FROM student_feedback
                                   WHERE subject_id = '$subjectID' AND clo_id = '$cloID'";

                                    $totalFeedbackResult = mysqli_query($connection, $totalFeedbackQuery);
                                    $totalFeedbackCount = mysqli_fetch_assoc($totalFeedbackResult)['TotalFeedbackCount'];

                                    // Output the data in table rows
                                    echo "<tr>";
                                    echo "<td>$subject</td>";
                                    echo "<td>$cloID</td>";
                                    echo "<td>$acceptedCount</td>";
                                    echo "<td>$remainingCount</td>";
                                    echo "<td>$totalFeedbackCount</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>



                        </table>
                        <!-- model box start----- -->

                    </div>
                </div>

            </div>

        </div>

    </div>

    </div>
    </div>
    </div>

    <!-- js CDN file -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> -->
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>
    <script src="js/main.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

    <!-- Jquery code to fetch record using jquery Ajax -->

    <!-- code for display Animated alert  -->




</body>

</html>