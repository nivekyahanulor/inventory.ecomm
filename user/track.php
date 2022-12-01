
    <?php 
    include('partials-front/menu.php'); 
    include('partials-front/login-check.php');
    ?>
    <?php 
           if(isset($_POST['submit'])&&$_POST['submit']!="")
           {
            $id=mysqli_escape_string($conn,$_POST['search']);
            $sql="
            SELECT a.*,SUM(b.price*a.check_qty) as total
            FROM tbl_checkout as a
            LEFT JOIN tbl_item as b
            ON a.check_item_id = b.id
            where a.check_unique_id='$id' 
            GROUP BY a.check_unique_id
            ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo' 
                <section class="cosmetics-search text-center">
                    <div class="cosmetics-search-img">
                
               
                <form action="" method="POST">
                <input type="search" name="search" placeholder="Track Your Order" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
                </div>
                </section>
                ';
                $df=50;
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo'<p style="text-align: center; font-weight:bold; font-size:xx-large; background-color:#5d9e5f; color:#fff; padding-top:1%; padding-bottom:1%;">';
                    if($row['check_status']==0)
                    {
                        echo 'Your order status is : Pending';
                    }else if ($row['check_status']==1)
                    {
                        echo 'Your order status is : Preparing';
                    }else if ($row['check_status']==2)
                    {
                        echo 'Your order status is : To Receive';
                    }else if ($row['check_status']==3)
                    {
                        echo 'Your order status is : Delivered';
                    }else if ($row['check_status']==4)
                    {
                        echo 'Your order status is : Canceled <br>';
                        echo'Reason: '.$row['check_reason'];
                    }
                    ?>
                 <br>
                 
                 <?php
                    if($row['check_senior']=='1')
                    {
                        $total=floatval($row['total'])+floatval($df);
                        $total2=$total-($total*0.15);
                        echo "Order Total Price : P ".$total2."0";
                    }else{
                        $total=floatval($row['total'])+floatval($df);
                        echo "Order Total Price : P ".$total.".00";
                    }
                 ?> 

                  </p>
              <?php  }
              } 
              else {
                echo' 
                <section class="cosmetics-search text-center">
                    <div class="cosmetics-search-img">
                
                <form action="" method="POST">
                <input type="search" name="search" placeholder="Track Your Order" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
                </div>
                </section>
                <p style="text-align: center; font-weight:bold; font-size:xx-large; background-color:#5d9e5f; color:#fff; padding-top:1%; padding-bottom:1%;">
                Search has no results.
                </p>
                ';
              }
           }else{
            echo' 
            <section class="cosmetics-search text-center">
                <div class="cosmetics-search-img">
            
           
            <form action="" method="POST">
            <input type="search" name="search" placeholder="Track Your Order" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
            </div>
            </section>
            ';
           }
           ?>


    <?php include('partials-front/footer.php'); ?>