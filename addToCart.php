<?php  
 include('admin/config/config.php');

?>

<div class="container">
<div class="main-content">
    <div class="wrapper">
        <h1>Add to cart</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['submit']))
                    {
                        echo $_SESSION['submit'];
                        unset($_SESSION['submit']);
                    }
                ?>
                <br><br>

                <table class="table table-light">
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty.</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_order1 ORDER BY id DESC";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        $sn = 1; 

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $status = $row['status'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>

                                        <td>
                                            <?php 

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                       
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
</div>