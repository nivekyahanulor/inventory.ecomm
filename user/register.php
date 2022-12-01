<?php include('config/constants.php'); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<style>
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Ecoommerce</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

<?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        

<div class="container" style="min-height:400px;">
<div class="content h-100 d-flex w-100 justify-content-center align-items-center">
    <div class="col-lg-4 col-md-5 col-sm-10 col-xs-12">
        <div class="card card-info rounded-0 mt-5">
            <div class="card-header">
                <div class="card-title h4 mb-0 fw-bold text-center">Sign Up</div>
            </div>
            <div  class="card-body">
                <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="fname" name="fname"
                            placeholder="First name" required>
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="mname" name="mname"
                            placeholder="Middle name">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="lname" name="lname"
                            placeholder="Last name" required>
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Contact Number" required>
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Address" required>
                        <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Email" required>
                        <span class="input-group-text"><i class="fa fa-at"></i></span>
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">Birthday</span>
                        <input type="date" class="form-control" id="bday" name="birthday"
                            placeholder="Birthday" min= "1950-01-01" max= "2022-01-01"title="Date of Birthday" required>
                        <!-- <span class="input-group-text"><i class="fa fa-calendar"></i></span> -->
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" readonly class="form-control" id="age" name="age"
                            placeholder="Age" required>
                        <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <script>
                        

                        var d = new Date();
                        $("#bday").change(function(){
                            var bdate=$("#bday").val().toString().split("-");
                            var byear=parseInt(bdate[0]);    
                        console.log(parseInt(d.getFullYear())-byear);
                        // d.getFullYear()
                        //d.getMonth()
                        //d.getDate()
                        $("#age").val(parseInt(d.getFullYear())-byear)

                    });
                        
                    </script>
                    <div class="input-group mb-3">
                        <select name="gender" id="" class="form-control" required>
                            <option value="">Select Gender</option>t
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="No Response">Prefered not to say</option>
                        </select>
                        <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Username" required>
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                             placeholder="Password" required>
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <div class="text-center">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="create" value="Create Account" class="btn btn-warning">
                        </div>
                    </div>
                    <div class="text-center">
                    <a href="./login.php" class="text-decoration-none">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['create'])){
        
        $fname=mysqli_escape_string($conn,trim($_POST['fname']));
        $mname=mysqli_escape_string($conn,trim($_POST['mname']));
        $lname=mysqli_escape_string($conn,trim($_POST['lname']));
        $phone=mysqli_escape_string($conn,trim($_POST['phone']));
        $address=mysqli_escape_string($conn,trim($_POST['address']));
        $email=mysqli_escape_string($conn,trim($_POST['email']));
        $username=mysqli_escape_string($conn,trim($_POST['username']));
        $password=mysqli_escape_string($conn,trim($_POST['password']));
        $birthday=mysqli_escape_string($conn,trim($_POST['birthday']));
        $gender=mysqli_escape_string($conn,trim($_POST['gender']));

     $sql="INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `fname`,`mname`,`lname`, `address`, `email`, `bday`, `gender`) VALUES (NULL, '$username', '$password', '$fname','$mname','$lname', '$address', '$email', '$birthday', '$gender')";
    if(mysqli_query($conn,$sql)){
        $_SESSION['login'] = "<div class='success'>Created Successful.</div>";
        echo'<script>
        window.location.href = "login.php";
        </script>';
    }else{
        $_SESSION['login'] = "<div class='success'>Created Failed.</div>";
        echo'<script>
        window.location.href = "register.php";
        </script>';
    }
    }
?>
