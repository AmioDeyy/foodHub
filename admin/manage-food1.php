<?php include('other/menu.php'); ?>

<div class="container">
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food 1</h1>

            <br /><br />

            <!-- Button to Add Admin -->
            <a href="add-food1.php" class="btn btn-primary btn-sm">Add Food 1</a>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if (isset($_SESSION['unauthorize'])) {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>

            <table class="table table-light">
                <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Featured</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>

                </tr>

                <?php
                $sql = "SELECT * FROM table_food1";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        //get the values from individual columns
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td>$<?php echo $price; ?></td>
                            <td>
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='error'>Image not Added.</div>";
                                } else {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" height="120px">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food1.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food1.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    //Food not Added in Database
                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                }

                ?>


            </table>
        </div>

    </div>

</div>
