<?php
session_start();

    unset( $_SESSION['cart'][$_GET['delete_id']]);
    $_SESSION['message']="Product Deleted to Cart";
    header("Location:cart.php");
?>