
    <?php include('partials-front/menu.php'); ?>

    <!-- cosmetics sEARCH Section Starts Here -->
    <!-- <section class="cosmetics-search text-center">
        <div class="cosmetics-search-img">
            
            <form action="<?php echo SITEURL; ?>cosmetics-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for cosmetics.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section> -->
    <!-- cosmetics sEARCH Section Ends Here -->



    <!-- cosmetics MEnu Section Starts Here -->
    <section class="cosmetics-menu">
        <div class="container">
            <h2 class="text-center">Item Menu</h2>

            <?php 
                //Display cosmeticss that are Active
                $sql = "SELECT * FROM tbl_item WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the cosmeticss are availalable or not
                if($count>0)
                {
                    //cosmeticss Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="cosmetics-menu-box">
                            <div class="cosmetics-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" alt="Cake" class="img-responsive img-curve">
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

                                <a href="add-cart.php?id=<?php echo $id; ?>" classss="btn btn-primary">Add to cart</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //cosmetics not Available
                    echo "<div class='error'>cosmetics not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- cosmetics Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>