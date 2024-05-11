<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        #tableContainer th {
            background-color: #3A3FCE;
            text-align: center;
            border: 1px solid lightgray;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
            color: whitesmoke;
        }

        #tableContainer {
            display: table;
            font-size: .9rem;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
        }

        #tablecontainer td {
            border: 1px solid red;
            text-align: center;
        }

        .btn {
            display: block;
            width: 10%;
            margin: 5px auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow bg-white ">
                    <div class="card-header bg-primary addheadercolor shadow-lg">
                        Subject With CLO Record
                    </div>
                    <div class="card-body bg-white">
                        <form action="assign_subject.php" method="POST">
                            <div class="form-group">
                                <label for="subject">Select Subject:</label>
                                <select class="form-control" name="subject" id="subject" onchange="fetchSubjectData()">
                                    <option value="">Select a Subject</option>
                                    <!-- Options will be dynamically populated from the database -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="teacher">Select Teacher:</label>
                                <select class="form-control" name="teacher" id="teacher" onchange="fetchSubjectData()">
                                    <option value="">Select a Teacher</option>
                                    <!-- Options will be dynamically populated from the database -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary shadow mb-3">Assign</button>
                        </form>

                        <div id="tableContainer"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script-assign.js"></script>
</body>

</html>