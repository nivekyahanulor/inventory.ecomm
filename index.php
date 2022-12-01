<?php 

 //========================= For Ecomm users ==============================:
 if(isset($_POST['log'])){
  $password = $_POST['password'];
  $username = $_POST['username'];
  $query = "SELECT * from `tbl_user`;";
  if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
        foreach(fetchAll($query) as $row){
          if($row['username']==$username&&$row['password']==$password){
              $_SESSION['login'] = true;
              $_SESSION['username'] = $row['username'];
              header('location:http://localhost/inventoryericemill/user/about.php');
          }
          else{
              echo "<script>alert('Your login details does not match.')</script>";
          }
      }
  }else{
      echo "<script>alert('Error.')</script>";
  }

}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inventory & Ordering System</title>
	
    
        <link rel="stylesheet" href="assets/css/style.css">

  </head>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">  
    
  

    <div class="container">

  <div id="login-form">

    <h3>User Login</h3>

    <fieldset>

      <form id="form-login">
        <input type="text" autofocus id="un" placeholder="Username" required autocomplete="off"> 

        <input type="password" id="up" placeholder="Password" required autocomplete="off">  
        <p>Dont have an account? <a href="reg form.php">Create an Account</a></p>
        <input type="submit" name="log" value="Login">
      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>
    
    
    
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>

    
  </body>
</html>



 