<?php include('other/menu.php'); ?>

<div class="container">
<div class="main-content">
    <div class="wrapper">
        <h1>update Admin</h1>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `table_admin`";
        $res = mysqli_query($conn, $sql) ;

        if($res == true)
        {
            $count = mysqli_num_rows($res);
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        ?>
<form action="" method="POST">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label ">Full Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control mb-2" name="full_name" value="<?php echo $full_name; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control mb-2" name="username" value="<?php echo $username;?>">
    </div>

  </div>
    <div class="text-center">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Update Admin" class="btn btn-primary btn-sm">
    </div>
  
  </div>
</form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];


    $sql = "UPDATE `table_admin` SET `full_name`='$full_name',`username`='$username' WHERE `id`='$id'";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully.</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update'] = "Failed to update Admin";
        header("location:".SITEURL."<div class = 'danger'>admin/manage-admin.php' </div>");
    }
}
?>
