<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        form {
            background-color: #fff;
            padding: 15px;
            /* box-shadow: 0px 0px 10px 0px; */
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="mx-auto d-flex justify-content-center align-items-center">
            <a class="navbar-brand " href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <div class="conatiner-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <form action="" method="POST">
                    <div class="mb-3">
                        <h3>Admin Login Form</h3>

                        <?php
                        if (isset($_SESSION['login'])) {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                        if (isset($_SESSION['no-login-message'])) {
                            echo $_SESSION['no-login-message'];
                            unset($_SESSION['no-login-message']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        username :
                        <input type="text" class="form-control" name="username">

                    </div>
                    <div class="mb-3">
                        Password :
                        <input type="text" class="form-control" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary col-12" name="submit">Login</button>
                    <!-- <a href="register.php">Register here</a> -->
                </form>
            </div>
        </div>
    </div>




    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM `table_admin` WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['username'] = $username;
            header('location:' . SITEURL . 'admin/admin-home.php');
        } else {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match</div>";
            header('location:' . SITEURL . 'admin/index.php');
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>