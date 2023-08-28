<?php
include('config/config.php');
echo $id = $_GET['id'];

$sql = "DELETE FROM table_admin WHERE id=$id";

$res = mysqli_query($conn, $sql) or die(mysqli_connect_error());


if($res == true)
{
    $_SESSION['delete'] = "<div class = 'success'> Admin Deleted Successfully. </div>";
    header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "<div class = 'danger'> Failed to Delete Admin. Try Again Later. </div>";
    header("location:".SITEURL.'admin/manage-admin.php');
}

?>