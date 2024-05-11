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
$sql = "SELECT teacher_login.name, subject_table.Subject_Name, clo_table.CLO_ID, clo_table.CLO_Title, clo_table.Subject_Counter, content_table.Content_Details
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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- add other styles and scripts here -->
</head>

<body>
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
                        <input class='custom-control-input' type='checkbox' id='$id' onclick='updateProgress(this, $contentCountSorry, the response got cut off due to character limit. Here is the rest of the code.

```php
, $cloNo)'>
                        <label class='custom-control-label' for='$id'></label>
                    </div>
                </td>
                <td>" . $row["Subject_Name"] . "</td>
                <td>" . $row["CLO_Title"] . "</td>
                <td>" . $cloNo . "</td>
                <td>" . $row["Content_Details"] . "</td>
                <td>
                    <div class='progress'>
                        <div class='progress-bar " . $progressBarColors[$cloNo] . "' id='progress_$id' role='progressbar' style='width: 0%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>0%</div>
                    </div>
                </td>
            </tr>";
            }

            echo "</tbody>
        </table>";

            // Print overall progress bars for each CLO
            foreach ($totalCLOCount as $cloNo => $totalCount) {
                echo "<div class='mt-3'>
                <h5>CLO $cloNo Overall Progress</h5>
                <div class='progress'>
                    <div class='progress-bar " . $progressBarColors[$cloNo] . "' id='overall-progress-$cloNo' role='progressbar' style='width: 0%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>0%</div>
                </div>
            </div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <!-- ...HTML content... -->

    <script>
        var totalCLOCount = <?php echo json_encode($totalCLOCount); ?>; // Pass PHP variable to JavaScript
        var completedCLOCount = {}; // Count of completed content for each CLO

        // Initialize the completedCLOCount for each CLO
        Object.keys(totalCLOCount).forEach(function(cloNo) {
            completedCLOCount[cloNo] = 0;
        });

        function updateProgress(checkbox, contentCount, cloNo) {
            var progressBarId = '#progress_' + checkbox.id;
            var overallProgressBarId = '#overall-progress-' + cloNo;
            if (checkbox.checked) {
                $(progressBarId).css('width', '100%').attr('aria-valuenow', '100').text('100%');
                completedCLOCount[cloNo] += contentCount;
            } else {
                $(progressBarId).css('width', '0%').attr('aria-valuenow', '0').text('0%');
                completedCLOCount[cloNo] -= contentCount;
            }
            var overallProgress = (completedCLOCount[cloNo] / totalCLOCount[cloNo]) * 100;
            $(overallProgressBarId).css('width', overallProgress + '%').attr('aria-valuenow', overallProgress).text(overallProgress.toFixed(2) + '%');
        }
    </script>
</body>

</html>