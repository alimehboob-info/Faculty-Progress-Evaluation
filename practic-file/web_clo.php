<!DOCTYPE html>
<html>

<head>
    <title>Subject Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card shadow bg-white">
            <div class="card-header addheadercolor text-center ">
                Web Engineering Subjec Detail
            </div>
            <div class="card-body bg-white">
                <table class="table table-hover table-bordered table-font">
                    <thead class="addheadercolor">
                        <tr>
                            <th>Subject ID</th>
                            <th>Subject Name</th>
                            <th>CLO ID</th>
                            <th>CLO Title</th>
                            <th>Content Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Connect to the database
                        $conn = mysqli_connect("localhost", "root", "", "faculty");

                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch data from the tables
                        $sql = "SELECT subject_table.Subject_ID, subject_table.Subject_Name, clo_table.CLO_ID, clo_table.CLO_Title, content_table.Content_Details
                        FROM subject_table
                        JOIN clo_table ON subject_table.Subject_ID = clo_table.Subject_ID
                         JOIN content_table ON clo_table.CLO_ID = content_table.CLO_ID";

                        $result = mysqli_query($conn, $sql);

                        // Display the data in the Bootstrap table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Subject_ID'] . "</td>";
                                echo "<td>" . $row['Subject_Name'] . "</td>";
                                echo "<td>" . $row['CLO_ID'] . "</td>";
                                echo "<td>" . $row['CLO_Title'] . "</td>";
                                echo "<td>" . $row['Content_Details'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Include Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>