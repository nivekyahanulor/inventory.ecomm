<?php include('config/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory & Ordering System | User</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/Logo.png" alt="Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right" >
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Product</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>cosmeticss.php">cosmeticss</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>about.php">About us</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>cart.php">Cart</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>track.php">Track Order</a>
                    </li>
                    
                    <li>
                        <a href="#">Contact</a>
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