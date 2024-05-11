<!-- @format -->
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.php");
    exit();
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
    <link rel="stylesheet" href="css/style.css" />
    <!-- <script>
        (ajax)
        function load() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sidebar").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "addteacher.html", true);
            xhttp.send();
        }
    </script> -->

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
                <a href="add_student.php" class="nav-link text-dark">
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
                <a href="admin_logout.php
                " class="nav-link text-dark">
                    <i class="fa-solid fa-right-to-bracket fa-beat-fade mr-3 text-primary fa-fw"></i>
                    logout
                </a>
            </li>
        </ul>


    </div>
    <!-- End vertical navbar -->
    <!-- Page TOP content holder -->
    <div class="page-content p-5" id="content">
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
    <div class="container ">
        <div class="row section-card">
            <div class="col-sm-4">
                <div class="card shadow style-card ">
                    <div class="card-body card-align ">
                        <h5 class="card-title">Total Teacher</h5>
                        <b>
                            <p class="card-text d-inline-block show-teacher">10</p>
                            <span class="float-right"><i class="fa-solid fa-people-group fa-fade group"></i></span>
                        </b>
                    </div>
                    <a href="addteacher.php" class="btn btn-primary clearfix">Add Teacher</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card shadow style-card ">
                    <div class="card-body card-align">
                        <h5 class="card-title ">Total Subject </h5>
                        <b>
                            <p class="card-text d-inline-block show-teacher">10</p>
                            <span class="float-right"><i class="fa-solid fa-book fa-fade group"></i></span>
                        </b>
                    </div>
                    <a href="cloadd.php" class="btn btn-primary clearfix">Add CLO</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card shadow style-card ">
                    <div class="card-body card-align ">
                        <h5 class="card-title ">Total Assign Teacher</h5>
                        <b>
                            <p class="card-text d-inline-block show-teacher">10</p>
                            <span class="float-right"><i class="fa-solid fa-book-open-reader fa-fade group"></i></span>
                        </b>
                    </div>
                    <a href="assign.php" class="btn btn-primary clearfix">Assign CLO</a>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>
    <script src="js/main.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>