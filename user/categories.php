
<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories" style="margin-top:-300px">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>

            <?php 

                //Display all the cateories that are active
                //Sql Query
                $sql = "SELECT * FROM item_type";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether categories available or not
                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['item_type_id'];
                        $title = $row['item_type_desc'];
                        // $image_name = $row['image_name'];
                        $image_name = '';
                        ?>
                        
                        <a href="category-item.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Cake" style="width:40%" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                                
                                <h3 class=" text-dark"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //CAtegories Not Available
                    echo "<div class='error'>Category not found.</div>";
                }
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>