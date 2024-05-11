<!DOCTYPE html>
<html>

<head>
    <title>Web Engineering Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .progress {
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Web Engineering Details</h2>
        <form method="post" action="storevisual_data.php">
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
                            WHERE st.Subject_Name = 'visual Programming'";

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

</body>

</html>