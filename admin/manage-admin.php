<?php include('other/menu.php'); ?>

<!-- Main Content Section Starts -->

<div class="container">
    <div class="main-content">
        <div class="wrapper">
            <h1>Mange Admin</h1>
            <a href="add-admin.php" class="btn btn-primary btn-sm">Add Admin</a>
            <br>
            <br>

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if (isset($_SESSION['pwd-not-match'])) {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
            if (isset($_SESSION['change-pwd'])) {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            ?>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <?php
                $sql = "SELECT * FROM `table_admin`";
                $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());

                if ($res == true) {
                    $count = mysqli_num_rows($res);
                    $cnt = 1;
                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                ?>

                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $cnt++ ?></th>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>

                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" type="button" class="btn btn-primary btn-sm">Change Password</a>

                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" type="button" class="btn btn-success btn-sm">Update Admin</a>

                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger btn-sm">Delete Admin</a>
                                </tr>
                            </tbody>

                <?php

                        }
                    } else {
                    }
                }

                ?>
            </table>
        </div>
    </div>
</div>