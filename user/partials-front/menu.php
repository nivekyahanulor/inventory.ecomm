<?php include('config/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory & Ordering System | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="mb-3" style="  background-color: #1f2605;">
        <div class="container" >
            <div class="logo">
                <a href="http://localhost/inventoryericemill/user/" title="Logo">
                    <img src="images/logo.png" alt="Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right" >
                <ul>
                    <li>
                        <a href="http://localhost/inventoryericemill/user/">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Product</a>
                    </li>
                    <li>
                        <a href="about.php">About us</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="#"id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" ><i class="bi bi-person-fill dropdown" ></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php 
                            if(isset($_SESSION['user_user'])){
                               $sel="SELECT * FROM user where user_account='{$_SESSION['user_user']}'";
                               $row=mysqli_fetch_array(mysqli_query($conn,$sel));
                               if($row['verify']==1){
                                echo' <a class="dropdown-item text-primary">Verified</a>';
                               }
                                else{
                                echo' <a class="dropdown-item text-danger" href="verify.php">Not Verified</a>';
                                }
                                echo ' <a class="dropdown-item" href="track-order.php">My Purchases</a>
                                <a class="dropdown-item" href="cart.php">Cart</a>
                                <a class="dropdown-item" href="http://localhost/inventoryericemill/index.php">Logout</a>'
                                ;
                            }else{
                                echo '
                                <a class="dropdown-item" href="login.php">Login</a>
                                <a class="dropdown-item" href="register.php">Signup</a>
                                ';
                            }
                            ?>
                        </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>

        <div class="message" 
       >
            <?php 
                if(isset($_SESSION['message'])){
                    echo '<p  style=" text-align: center; padding:1%;
                    background-color: #5d9e5f;
                    color: #ececec;">'.$_SESSION['message'].'</p>';
                    unset($_SESSION['message']);
                }
            ?>
        </div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>