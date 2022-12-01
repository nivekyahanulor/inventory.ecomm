    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            error_reporting(0);
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT item_name FROM item WHERE item_type_id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['item_name'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>
    <!-- cosmetics MEnu Section Starts Here -->
    <section class="cosmetics-menu">
        <div class="container">
            <h2 class="text-center" style="margin-top:-350px;">Rice Variety</h2>

            <?php 
            
                //Create SQL Query to Get cosmeticss based on Selected CAtegory
                $sql2 = "SELECT * FROM item WHERE item_type_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether cosmetics is available or not
                if($count2>0)
                {
                    //cosmetics is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['item_code'];
                        $title = $row2['item_name'];
                        $price = $row2['item_price'];
                        $description = $row2['item_brand'];
                        $image_name = '';
                        // $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="cosmetics-menu-box">
                            <div class="cosmetics-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="images/item/<?php echo $image_name; ?>" alt="Rice" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="cosmetics-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="cosmetics-price">₱<?php echo $price; ?></p>
                                <p class="cosmetics-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <!-- <a href="<?php echo SITEURL; ?>order.php?cosmetics_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                                <!-- <a href="add-cart.php?id=<?php echo $id; ?>" classss="btn btn-primary">Add to cart</a> -->
                                <?php include("add.php")?>

                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //cosmetics not available
                    echo "<div class='error'>Product is not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- cosmetics Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>