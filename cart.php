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
    <title>Cart Page</title>

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
                    <a href="#">Panshi</a>
                    <a href="#">Pachvai </a>

                </div>
            </div>
            </li>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">Food</a>
                <div class="dropdown-content">
                    <a href="#">Panshi food</a>
                    <a href="#">Pachvai food</a>

                </div>
            </div>

            <li><a href="<?php echo SITEURL; ?>login.php">Logout</a></li>
        </ul>


    </header>
</body>

</html>

<?php

if (isset($_GET['food_id'])) {
    
    $food_id = $_GET['food_id'];

  
    $sql = "SELECT * FROM table_food WHERE id=$food_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
   
    if ($count == 1) {
        
        
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
 
        header('location:' . SITEURL);
    }
} else {
   
    header('location:' . SITEURL);
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <h3>Selected Food</h3>

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

                    <input type="submit" name="submit" value="Add to cart" class="btn btn-primary">

                </div>

            </fieldset>



        </form>

        <?php

        if (isset($_POST['submit'])) {

            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty; 

            $status = "Ordered";  

            $sql2 = "INSERT INTO tbl_order1 SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        status = '$status'
                        
                    ";

            $res2 = mysqli_query($conn, $sql2);


            if ($res2 == true) {
                $_SESSION['cart'] = "<div class='success text-center'>Food added to cart Successfully.</div>";
                header('Location: addToCart.php');
                exit(); 
            } else {
                $_SESSION['cart'] = "<div class='error text-center'>Failed to add  Food.</div>";
                header('Location: cart.php');
                exit();
            }
        }




        ?>

    </div>
</section>