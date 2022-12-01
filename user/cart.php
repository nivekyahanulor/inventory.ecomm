
<?php include('partials-front/menu.php');
include('partials-front/login-check.php');

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
if(isset($_POST['submit']) && isset($_POST['check_mode'])){
    // $n=mysqli_escape_string($conn,$_POST['check_name']);
    // $p=mysqli_escape_string($conn,$_POST['check_phone']);
    // $a=mysqli_escape_string($conn,$_POST['check_address']);
    // $e=mysqli_escape_string($conn,$_POST['check_email']);
    // $z=str_replace(' ', '', $n);
    $unique=date("m-d-H-i-s").'-'.rand(1000,3);
    $_SESSION ['message']="sss";
    $check=true;
    for($i =0; $i<sizeof($_POST['check_id']); $i++)
    {
       
    //    $sql="INSERT INTO `tbl_checkout` (`check_id`, `check_item_id`, `check_unique_id`, `check_name`, `check_address`, `check_phone`, `check_email`, `check_qty`, `check_date`,check_mode,check_senior) 
    //    VALUES 
    //    (NULL, '{$_POST['check_id'][$i]}', '$unique', '$n', '$a', '$p', '$e', '{$_POST['check_qty'][$i]}', current_timestamp(),'{$_POST['check_mode']}','{$_POST['check_senior']}')";

       $sql ="INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `brand`, `gram`, `type`, `qty`, `price`, `date_sold`,sales_track,sales_mop,sales_user_id) 
       VALUES (NULL, '{$_POST['check_id'][$i]}', '', '', '', '', '{$_POST['check_qty'][$i]}', '', current_timestamp(),'$unique','{$_POST['check_mode']}','{$_SESSION['user_user']}')";
        
       if(mysqli_query($conn,$sql)){
            
        }else{
            $check=false;
        }

    }
    if($check){
        unset($_SESSION['cart']);
        $_SESSION['message']="Ordered successfully <br> This is your tracking order : ".$unique;
        
    }else{
        $_SESSION['message']="Ordered Failed";
        header("Location:cart.php");
    }
}

if(isset($_POST['submit']) && isset($_POST['cosmetics_id'])){
    echo '<form method="post">';
    for($i =0; $i<sizeof($_POST['cosmetics_id']); $i++)
    {
        // echo $_POST['cosmetics_id'][$i];
        echo '<input type="hidden" name="check_id[]" value="'.$_POST['cosmetics_id'][$i].'">';
        echo '<input type="hidden" name="check_qty[]" value="'.$_POST['cosmetics_qty'][$i].'">';
    ?>    
    <?php
    }?>
        <div style="width:40%; text-align:center; margin-left:30%">
            <h1 style="font-weight:lighter; margin-bottom:5%; margin-top:-350px;">Payment Option</h1>
            <select name="check_mode" id="" style="width:105%; text-align:center; padding:2%; margin-bottom:1%;" required>
            <?php $sel="SELECT * FROM user where user_account='{$_SESSION['user_user']}'";
                    $r=mysqli_fetch_array(mysqli_query($conn,$sel));
                    if($r['verify']=="0"){
                        echo'
                        <option value="">Mode of payment</option>
                        <option value="Pick">Pick up</option>
                        ';
                    }else{
                        echo'
                        <option value="Pick">Pick up</option>
                        <option value="COD">Cash on Delivery</option>
                        ';
                    }

                ?>
                
            </select>
            <input type="submit" name="submit" style="width:50%; margin-left:10%; padding:2%; background-color:bisque;" required>
</form>
        </div>

<?php

}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php

if(!isset($_POST['submit'])){ ?>
<table class="table" style="text-align: center; margin-top:-350px;">
    <thead>
        <tr>
            <th>Action</th>
            <!-- <th>Image</th> -->     
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <form action="" method="post">
        <?php
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
           {
            foreach($_SESSION['cart'] as $key){
                $sql="SELECT * FROM item where item_code = '$key'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
            ?>
        <tr>
           <td><a href="delete-item.php?delete_id=<?php echo $key?>">Delete</a></td>
            <!-- <td><img src="images/cosmetics/<?php //echo $row['image_name']?>" alt="img"></td> -->
            <td><?php echo $row['item_name']?></td>
            <td><?php echo $row['item_price']?></td>
            <input type="hidden" name="cosmetics_id[]" value="<?php echo $key?>">
            <input type="hidden" value="<?php echo $row['item_price']?>"class="price" >
            <td style="width: 20%;"><input type="number" name="cosmetics_qty[]" class="zz" min="1" value="1" style="width: 90%; margin-left:5%" required></td>
            <td style="width: 20%;" ><input type="" disabled class="subtotal" style="width: 90%; margin-left:5%"></td>
        </tr>
        <?php 
            }   }
      ?> 

    </thead>
    <tr>
        <td colspan="4" style="text-align: right; padding-right:2%;">TOTAL</td>

        <!-- <td colspan="3" style="text-align: right; padding-right:2%;">TOTAL</td> -->
        <td><input type="" style="width: 90%; margin-left:5%"    disabled id="totalbill"></td>
    </tr>
</table>
<button type="submit" name="submit" style="float: right; margin-right:10%; padding:0.5%; margin-top:1%; cursor:pointer;">Checkout</button>
</form>
    <?php  }else{
            echo'<tr>
                   <td colspan="10">No items in cart</td>
                </tr> </table>
                ';
        }
           }
        ?>

<?php include('partials-front/footer.php'); ?>
<script>
var a=false
$('.zz').change(function(){
    var arr=[]
    var arr2=[]
    $('.price').each(function(){
        arr.push($(this).val())
        if($(this).val()===''){
            a=true
        }
    })
    
    if(a===false){
        $('.zz').each(function(){
            if($(this).val()===''){
                arr2.push("1")
            }else{
                arr2.push($(this).val())
            }
            
        })
    }

var i=0
var total=0.0
    $('.subtotal').each(function(){
    
    $(this).val(parseFloat(arr[i])*parseFloat(arr2[i]))
    total+=parseFloat(arr[i])*parseFloat(arr2[i]);

    i+=1
    })
    // console.log(total)
    $('#totalbill').val("P "+total+".00")
})


</script>