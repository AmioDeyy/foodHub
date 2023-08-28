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
    <title>Order Page</title>

    <style>
        .food-search {
            background-color:#fff;
            color: #FFFFFF;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>


    <header>


        <h3>Sylhet Food Hub</h3>


        <ul class="navbar">
            <li><a href="<?php echo SITEURL; ?>index.php">Home</a></li>
            <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">Resturant</a>
                <div class="dropdown-content">

                </div>
            </div>
            </li>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">Food</a>


            </div>
            </div>

            <li><a href="<?php echo SITEURL; ?>login.php">Logout</a></li>
            <!-- <li><a href="#" class="cart"><i class='bx bxs-cart-download'></i></a></li> -->
        </ul>


    </header>
</body>

</html>

<?php
//CHeck whether food id is set or not
if (isset($_GET['food_id'])) {
    //Get the Food id and details of the selected food
    $food_id = $_GET['food_id'];

    //Get the DEtails of the SElected Food
    $sql = "SELECT * FROM table_food WHERE id=$food_id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //CHeck whether the data is available or not
    if ($count == 1) {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        //Food not Availabe
        //REdirect to Home Page
        header('location:' . SITEURL);
    }
} else {
    //Redirect to homepage
    header('location:' . SITEURL);
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <!-- <h2 class="text-center text-white">Fill this form to confirm your order.</h2> -->

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

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
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">৳<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Apu Deb" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. +88017xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. apu@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php

        if (isset($_POST['submit'])) {

            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty; // total = price x qty 

            $order_date = date("Y-m-d h:i:sa"); //Order DAte

            $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

            $res2 = mysqli_query($conn, $sql2);


            if ($res2 == true) {

                $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";

                header('Location: cart.php');
            } else {
                $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                header('Location: cart.php');
            }
        }

        ?>

    </div>
</section>