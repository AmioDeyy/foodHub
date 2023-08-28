<?php include('other/menu.php'); ?>

<div class="container">
    <!-- Menu Item -->
    <div class="container-fluid p-4">

        <h1>Dashboard</h1>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <div class="row " style="text-align: center; ">
            <div class="col-lg-3 col-md-6 bg-primary  ">
                <?php
                $sql = "SELECT * FROM table_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                ?>

                <h1><?php echo $count; ?></h1>
                <br />
                Categories
            </div>
            <div class="col-lg-3 col-md-6 bg-danger ">
                <?php
                $sql2 = "SELECT * FROM table_food";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                <br />
                Foods
            </div>
            <div class="col-lg-3 col-md-6">
                <?php
                $sql3 = "SELECT * FROM tbl_order";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
                ?>

                <h1><?php echo $count3; ?></h1>
                <br />
                Total Orders
            </div>
            <div class="col-lg-3 col-md-6">
                <?php

                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                $res4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($res4);
                $total_revenue = $row4['Total'];

                ?>

                <h1>৳<?php echo $total_revenue; ?></h1>
                <br />
                Revenue Generated
            </div>
        </div>
        <!-- <div class="wrapper">
            <h1>Dashboard</h1>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="clearfix"></div>
        </div> -->
    </div>
</div>
<!-- footer Section Starts Here -->

<!-- footer Section Ends Here -->