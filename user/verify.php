
    <?php 
    include('partials-front/menu.php'); 
    include('partials-front/login-check.php');
    $user=$_SESSION['user_user'];
    $check="SELECT * FROM verification where verify_user='{$_SESSION['user_user']}'";
    $result = $conn->query($check);
   
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    // for having a data in verification
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        include('verify-update.php');
        include('verify-update-img.php');
       ?>



    <!-- For no data in verification -->
   <?php }else{
        include('verify-add.php');
        include('verify-new.php');
    }
    ?>
    <?php include('partials-front/footer.php'); ?>