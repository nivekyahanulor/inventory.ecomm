<?php

@include 'user/config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['user_account']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $pass = md5($_POST['user_pass']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user WHERE user_account = '$username' && user_pass = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 1){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user (name, user_account, user_pass, user_type) VALUES('$name','$username','$pass','$user_type')";
         mysqli_query($conn, $insert); 
         header('location:http://localhost/inventoryericemill/index.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Sign Up</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your full name">
      <input type="text" name="user_account" required placeholder="Enter your username">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="text" name="address" required placeholder="Enter your Full Address ex. Street Name, Building, House No,.">
      <input type="text" name="number" required placeholder="Enter your phone number" >
      <input type="password" name="user_pass" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
     <input type="submit" name="submit" value="Sign up now" class="form-btn">
          <p>Already have an account? <a href="logout.php">Login Now</a></p>
      </div>
</div>
</section>
</div>
</div>
        
</div>
</body>
</html>