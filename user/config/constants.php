<?php 
    //Start Session
    session_start();
    include('../include/session.php');
    client();
    define('SITEURL', 'http://localhost/inventory rice mill/user/');
    $db='daniela';
    $conn = mysqli_connect('localhost', 'root', '',$db) or die(mysqli_error($conn)); //Database Connection
    
    $db_select = mysqli_select_db($conn, $db) or die(mysqli_error($conn)); //SElecting Database


?>