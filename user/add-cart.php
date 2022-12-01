<?php
session_start();
if ( !isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = [];
}
print_r($_SESSION); echo '<br>';
if ( array_key_exists($_GET['id'],$_SESSION['cart']) ) {
    $_SESSION['message']="This product is already in cart";
    header("Location:index.php");
} else {
    $_SESSION['cart'][$_GET['id']] = $_GET['id'];
    $_SESSION['message']="Product Added to Cart";
    header("Location:index.php");
}
?>