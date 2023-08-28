
<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php 

            $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        ?>


        <h2>Foods on Your Search <a href="#" class="text-black">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Resturant</h2>

        <?php 

            $sql = "SELECT * FROM table_resturant1 WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the details
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Resturants" class="img-responsive img-curve">
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

                            <a href="#" class="btn btn-primary">See all</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available
                echo "<div class='error'>Resturant not found.</div>";
            }
        
        ?>

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
