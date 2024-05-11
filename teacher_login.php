<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form Using Bootstrap 5</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="css/loginform.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form action="teacher_dashboard.php" method="post" class="rounded set shadow py-5 px-4">
                    <div class="logo">
                        <img decoding="async" src="images/isplogo.png" class="img-fluid" alt="Logo">
                    </div>
                    <h3 class="text-light fw-bolder fs-4 mb-2">Teacher Login </h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label for="Password">Password</label>
                    </div>
                    <div class="mt-2 text-end">
                        <a href="#" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Login</button>

                    <a href="https://www.isp.edu.pk/" class="btn btn-light login_with w-100 mb-3 shadow">
                        <img decoding="async" alt="Logo" src="images/isplogo.png" class="img-fluid me-3">ISP
                        Official Site
                    </a>
                </form>
            </div>
        </div>
    </section>

</body>

</html>