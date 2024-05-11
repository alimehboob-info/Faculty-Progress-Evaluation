<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/style1_student.css">
    <link rel="stylesheet" href="css/student_dash.css">
    <style>
        .card-align h5 {
            font-size: .99rem;
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
    <div class="container ">
        <div class="row section-card">
            <div class="col-md-5">
                <div class="card shadow-lg CLO-style-card" style=" width: 17.6rem; ">
                    <div class=" card-body card-align ">
                        <h5 class=" card-title">Internet and Web Engineering</h5>

                        <p class="card-text d-inline-block add-clo">E300</p>
                        <span class="float-right">
                            <i class="fa-solid fa-book-open fa-fade group"></i></i></span>
                    </div>
                    <a href="evaluate_web.php" class="btn btn-add-clo clearfix shadow">Evaluate CLO</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow-lg CLO-style-card" style=" width: 17.6rem; ">
                    <div class="card-body card-align">
                        <h5 class="card-title ">Visual Programming </h5>
                        <p class="card-text d-inline-block add-clo">VS320</p>
                        <span class="float-right">
                            <i class="fa-solid fa-book-open fa-fade group"></i></span>
                    </div>
                    <a href="evaluate_visual.php" class="btn btn-add-clo clearfix shadow">Evaluate CLO</a>
                </div>
            </div>
        </div>
    </div>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="js/teacher_dash.js"></script>
</body>

</html>