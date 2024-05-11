<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="col-12">


            <div class="card shadow bg-white">
                <div class="card-header addheadercolor text-center">
                    <h5> Visual programming CLO with Content</h5>
                </div>
                <div class="card-body bg-white p-0">
                    <table class="table table-hover table-bordered table-font ">
                        <thead class="addheadercolor">
                            <tr class="text-center shadow">
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <!-- <th>CLO ID</th> -->
                                <th>CLO No</th>
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
                            $sql = "SELECT subject_table.Subject_ID, subject_table.Subject_Name, clo_table.CLO_ID,clo_table.Subject_Counter, clo_table.CLO_Title, content_table.Content_Details
                         FROM subject_table
                        JOIN clo_table ON subject_table.Subject_ID = clo_table.Subject_ID
                        JOIN content_table ON clo_table.CLO_ID = content_table.CLO_ID
                         WHERE subject_table.Subject_Name = 'visual programming'";

                            $result = mysqli_query($conn, $sql);

                            // Display the data in the Bootstrap table
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr class=''>";
                                    echo "<td class='text-center '>" . $row['Subject_ID'] . "</td>";
                                    echo "<td class='text-center'>" . $row['Subject_Name'] . "</td>";
                                    // echo "<td>" . $row['CLO_ID'] . "</td>";
                                    echo "<td class='text-center'>" . $row['Subject_Counter'] . "</td>";
                                    echo "<td class='text-center'>" . $row['CLO_Title'] . "</td>";
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
        </div>
        <!-- Include Bootstrap JS -->
</body>

</html>