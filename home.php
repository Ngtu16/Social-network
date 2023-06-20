<?php 
session_start();
include ("phpfunction\connect.php");
// include("function-php/info-user.php");
// include("function-php/posts.php");
include("home.html");
if(!isset($_SESSION['Email'])){
    echo "<script>window.open('login.php', '_self')</script>";
}
if (isset($_POST['logout'])) {
    // unset($_SESSION['user_name']);
    echo "<script>window.open('login.php', '_self')</script>";
}

?>
 