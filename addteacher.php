<!-- @format -->
<?php
// Database File 
include_once "database/config.php";



// Check if the user is not logged in, then redirect to the login page
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
                <a href="set_admin_subject.php" class="nav-link text-dark">
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
                <div class="card shadow bg-white ">
                    <h5 class="card-header addheadercolor">Add Teacher</h5>
                    <div class="card-body bg-white">
                        <!-- form start  -->
                        <form action="teacher-insert.php" method="Post">
                            <div class="input-group flex-nowrap mb-3 shadow placeholderwidth">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Teacher Name</span>
                                </div>
                                <input type="text" class="form-control" name="teachername" placeholder="Enter Teacher Name" required>
                            </div>
                            <div class="input-group flex-nowrap mb-3 shadow placeholderwidth">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Teacher Email</span>
                                </div>
                                <input type="email" class="form-control" name="teacheremail" placeholder="Enter Teacher Email" required>
                            </div>
                            <div class="input-group flex-nowrap mb-3 shadow placeholderwidth">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping" required>Teacher Password</span>
                                </div>
                                <input type="password" class="form-control" name="teacherpassword" placeholder="Enter Password">
                            </div>
                            <div class="input-group mb-3 placeholderwidth shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label shadow" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <input type="submit" class="btn addbtnteacher btn-primary" name="insert-teacher-btn">
                        </form>
                        <!-- form end -->
                    </div>
                    <!-- second card-heading inside card start -->
                    <h5 class="card-header addheadercolor ">Teacher Record</h5>
                    <div class="card-body bg-white">
                        <!-- php code to fetch record and show in table start -->
                        <?php
                        $query = "SELECT `id`, `name`, `email` FROM `teacher_login`";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {


                        ?>
                            <!-- table start -->
                            <table class="table table-striped table-bordered table-font">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Teacher Name</th>
                                        <th scope="col">Teacher Email</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <!-- while loop to fetch record and echo in TD -->
                                <?php

                                while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                    <tbody>
                                        <tr>
                                            <td class="stud_id"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td class="edit">
                                                <button type="button" class="btn btn-success edit_btn" data-toggle="modal" data-target="#staticBackdrop">
                                                    Edit
                                                </button>
                                            </td>
                                            <td class="delete">
                                                <form method="post" action="delete.php?id=<?php echo $row['id']; ?>">
                                                    <button class="btn btn-danger" type="submit" name="delete-btn">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    </tbody>
                                <?php }; ?>
                            </table>
                            <!-- model box start----- -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Update Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form inside model body start -->
                                            <form action="update.php" method="post">

                                                <input type="hidden" class="form-control" placeholder="ID" id="edit_id" name="id" required>

                                                <div class="input-group flex-nowrap mb-3 shadow placeholderwidth">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text-update" id="addon-wrapping">Teacher
                                                            Name</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Enter Teacher Name" id="edit_name" name="name" required>
                                                </div>
                                                <div class="input-group flex-nowrap mb-3 shadow placeholderwidth">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text-update" id="addon-wrapping">Teacher
                                                            Email</span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Enter Teacher Email" name="email" id="edit_email" required>
                                                </div>

                                                <input type="submit" value="Update" class="btn addbtnteacher btn-success" name="update_student">
                                            </form>
                                            <!-- form end  -->
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- model end----- -->
                    </div>

                </div>

            </div>

        </div>
    </div>
    </div>
<?php  } ?>
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
<script src="js/sweetalert.js"></script>
<!-- Jquery code to fetch record using jquery Ajax -->
<script>
    $(document).ready(function() {
        $('.edit_btn').click(function(e) {
            e.preventDefault();
            var stud_id = $(this).closest('tr').find('.stud_id').text();
            console.log(stud_id);

            $.ajax({
                type: "POST",
                // file path
                url: "update.php",
                data: {
                    // edit_btn class name of edit button
                    'checking_edit_btn': true,
                    // stud_id class name of table colum ID
                    'student_id': stud_id,

                },
                // use input field id and name to pass value to input
                success: function(response) {
                    $.each(response, function(key, value) {
                        // input id and name
                        $('#edit_id').val(value['id']);
                        $('#edit_name').val(value['name']);
                        $('#edit_email').val(value['email']);
                    });
                    $('#staticBackdrop').modal('show');
                }

            });
        });
    });
</script>
<!-- code for display Animated alert  -->

<?php

if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            //text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Done",
        });
    </script>

<?php
    unset($_SESSION['status']);
}

?>


</body>

</html>