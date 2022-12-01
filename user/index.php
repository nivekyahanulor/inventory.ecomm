    <?php 
    include('partials-front/menu.php'); 
    ?>
<!-- home logo -->
      <img style="margin-top:-409px;"src="PRODUCTS BEAU/rice.jpg" class="d-block w-100" alt="...">
<!-- home logo -->
   
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- Rice Variety Section Starts Here -->
    <section class="Rice-Variety" >
        <div class="container" style="margin-left: 19%; ">
            <h2 class="text-center" style="margin-left: -100px; ">Rice Variety</h2>

            <?php 
            
            //Getting cosmeticss from Database that are active and featured
            //SQL Query
            // $sql2 = "SELECT * FROM tbl_item WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $sql2 = "SELECT * FROM item LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether cosmetics available or not
            if($count2>0)
            {
                //cosmetics Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['item_code'];
                    $title = $row['item_name'];
                    $price = $row['item_price'];
                    $description = $row['item_brand'];
                    $image_name = $row['item_image'];

                    ?>

                    <div class="Rice-Variety-box">
                        <div class="Rice-Variety-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="../data/items/<?php echo $image_name; ?>" alt="Rice" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="Rice-Variety-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="Rice-Variety-price">₱<?php echo $price; ?></p>
                            <p class="Rice-Variety-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>
                                <?php include("add.php")?>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //cosmetics Not Available 
                echo "<div class='error'>cosmetics not available.</div>";
            }
            
            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="categories.php">See All Products</a>
        </p>
    </section>
    <!-- cosmetics Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>