<?php include('admin/config/config.php');

?>

<?php
// Start the session
session_start();

// Set session variables if the login form is submitted
if (isset($_POST['login'])) {
    $l_email = $_POST['l_email'];
    $l_pass = $_POST['l_pass'];

    // You can set session variables like this
    $_SESSION['l_email'] = $l_email;
    // You might not want to store the password in a session for security reasons
    // Instead, you can store a flag indicating that the user is logged in
    $_SESSION['logged_in'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Resturants</title>

</head>

<body>
    <header>
        <h3>Sylhet Food Hub</h3>


        <ul class="navbar">
            <li><a href="<?php echo SITEURL; ?>home.php">Home</a></li>
            <!-- <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li> -->
            <li><a href="<?php echo SITEURL; ?>resturents.php">Resturant</a></li>
            <li><a href="<?php echo SITEURL; ?>foods.php">Food</a></li>
            <li><a href="<?php echo SITEURL; ?>login.php">Logout</a></li>
        </ul>



    </header>
</body>

</html>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>resturant-search.php" method="POST">
            <input type="search" name="search" placeholder="Search Resturant." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- Resturant sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Resturant</h2>

        <?php
        $sql = "SELECT * FROM table_resturant1 WHERE active='Yes'";

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
                $image_name = $row['image_name'];
        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>

                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>foods.php?food_id=<?php echo $id; ?>" class="btn btn-primary">See All food</a>

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


<?php
if (isset($_SESSION['l_email'])) {
    $userEmail = $_SESSION['l_email'];
    echo "Logged in as: $userEmail";
}

// To check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in
} else {
    // User is not logged in
}
?>