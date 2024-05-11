<!DOCTYPE html>
<html>

<head>
    <title>Teacher Assignment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Assign Subject to Teacher</h3>
        <form id="assignForm" method="post" action="assign_subject.php">
            <div class="form-group">
                <label for="subjectSelect">Select Subject:</label>
                <select class="form-control" id="subjectSelect" name="subject">
                    <!-- Subject dropdown options will be dynamically populated -->
                </select>
            </div>
            <div class="form-group">
                <label for="cloSelect">Select CLO:</label>
                <select class="form-control" id="cloSelect" name="clo">
                    <!-- CLO dropdown options will be dynamically populated based on subject selection -->
                </select>
            </div>
            <div class="form-group">
                <label for="teacherSelect">Select Teacher:</label>
                <select class="form-control" id="teacherSelect" name="teacher">
                    <!-- Teacher dropdown options will be dynamically populated -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Subject</button>
        </form>

        <h3 class="mt-4">CLO Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>CLO Title</th>
                    <th>Subject Counter</th>
                    <th>Content Details</th>
                </tr>
            </thead>
            <tbody id="cloDetails">
                <!-- CLO details will be dynamically populated -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
</body>

</html>