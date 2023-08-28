<?php include('admin/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Foods 1</title>

    <style>


    </style>

</head>

<body>
    <header>
        <h3>Sylhet Food Hub</h3>


        <ul class="navbar">
            <li><a href="<?php echo SITEURL; ?>index.php">Home</a></li>
            <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li>

            <a href="all-resturent.php">Resturant</a>


            </li>

            <li><a href="<?php echo SITEURL; ?>login.php">Logout</a></li>

        </ul>


    </header>
</body>

</html>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql = "SELECT * FROM table_food1 WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt=" Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">৳<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        <a href="<?php echo SITEURL; ?>cart.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>

        <?php
            }
        } else {
            echo "<div class='error'>Food not found.</div>";
        }
        ?>





        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->