<?php include('other/menu.php'); ?>

<!-- Main Content Section Starts -->

<div class="container">
  <div class="main-content">
    <div class="wrapper">
      <h1>Add Admin</h1>
      <form action="" method="POST">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label ">Full Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control mb-2" name="fullname" placeholder="Fullname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control mb-2" name="username" placeholder="Username">
          </div>

        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control mb-2 " name="pass" placeholder="Password">
          </div>
        </div>
        <div class="text-center">
          <!-- <div class="btn btn-primary btn-sm" name="submit" type="submit">Add</div> -->
          <input type="submit" name="submit" value="Add Admin" class="btn btn-primary btn-sm">
          <!-- <a href="add-admin.php"class="btn btn-primary btn-sm " name="submit1" type="submit">Add Admin</a> -->
        </div>

    </div>
    </form>
  </div>
</div>


<!-- <?php
      if (isset($_POST['submit'])) {


        echo $fullname = $_POST['fullname'];
        echo $username = $_POST['username'];
        echo $password = md5($_POST['pass']);
        //md5 for encrypt password

        $sql = "INSERT INTO `table_admin`( `full_name`, `username`, `password`) VALUES ('$fullname','$username','$password')";



        //
        $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());

        if ($res == true) {
          $_SESSION['add'] = "Admin Added Successfully";
          header("location:" . SITEURL . 'admin/manage-admin.php');
        } else {
          $_SESSION['add'] = "Failed to Add Admin";
          header("location:" . SITEURL . 'admin/add-admin.php');
        }
      }
      ?> -->