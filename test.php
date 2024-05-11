<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Evaluate Web</title>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/style1_student.css">
    <link rel="stylesheet" href="css/student_dash.css">
    <link rel="stylesheet" href="css/student.css" />
    <style>
        .progress {
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar active">
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
                    <span class="links_name">Subject</span>
                </a>
                <span class="tooltip">Subject</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Notes</span>
                </a>
                <span class="tooltip">Notes</span>
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
                <a href="student_logout.php">
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
                        <div class="name">Student Name</div>
                        <div class="job">Subject </div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </div>
        </div>
    </div>
    <div class="container" style="margin-left: 280px;">
        <h2>Web Engineering Details</h2>
        <form method="post" action="store_data.php">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>CLO ID</th>
                        <th>Progress</th>
                        <th>Mark completed</th>
                        <th>Status</th>
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
                            echo "<td><div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='completed[" . $row['clo_id'] . "][completed]' value='Accepted'><label class='form-check-label'>Yes</label></div><div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='completed[" . $row['clo_id'] . "][completed]' value='Remaining' checked><label class='form-check-label'>No</label></div></td>";
                            echo "<td><button class='btn btn-success status'>Not Feedback</button></td>";
                            echo "<input type='hidden' name='completed[" . $row['clo_id'] . "][progress]' value='$progress'>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found.</td></tr>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                    <!-- End of PHP code -->
                </tbody>
            </table>
            <input type="hidden" name="subject" value="Web Engineering">
            <input type="hidden" name="teacher" value="Teacher Name">
            <input type="hidden" name="clo_id" value="1">
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name^="completed"]').on('change', function() {
                var statusElement = $(this).closest('tr').find('.status');
                var value = $(this).val();
                if (value === 'Accepted') {
                    statusElement.text('Accepted');
                } else {
                    statusElement.text('Remaining');
                }
            });
        });
    </script>

    <script src="fontawesome/js/all.min.js"></script>
    <script src="js/teacher_dash.js"></script>
</body>

</html>