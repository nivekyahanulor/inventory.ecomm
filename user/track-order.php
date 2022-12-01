
    <?php 
    include('partials-front/menu.php'); 
    include('partials-front/login-check.php');
    $user=$_SESSION['user_user'];
    ?>
    <h1 class="text-center h2" style="margin-top:-350px;">My Orders</h1>
    <table class="table text-center">
    <tr>
        <th>To Ship</th>
        <th>To Receive</th>
    </tr>
    <?php  
    $status="SELECT * FROM `sales` WHERE sales_user_id='{$_SESSION['user_user']}'
    GROUP BY sales_track";
    $result = $conn->query($status);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $stats=$row['sales_status'];
        ?>
         <tr>
         <?php if($stats=="0"){
            echo '<td>'.$row['sales_track'].'</td>
                  <td></td>';
         }else if($stats=="1"){
            echo '
            <td></td>
            <td>'.$row['sales_track'].'</td>';
         }
         ?>
        
        
    </tr>
     <?php }
    } else {
      echo "0 results";
    }
    ?>
   
    </table>

    <?php include('partials-front/footer.php'); ?>