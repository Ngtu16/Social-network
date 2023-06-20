<?php
include ("login.html");
session_start();
include "phpfunction\connect.php";
if (isset($_POST['login'])) {
    global $con;
    $username = htmlentities(mysqli_real_escape_string($con, $_POST['username']));
    $password = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
    $_SESSION['Email']=$username;
    $select_user = "select * from users where Email='$username' and Password='$password'";
    $query = mysqli_query($con, $select_user);
    $check_user= mysqli_num_rows($query);

    if($check_user==1){
        // $_SESSION['Email'] = $username;
        echo "<script>window.open('home.php', '_self')</script>";
    }
    else
    {
        echo "<script>alert('Email hoặc mật khẩu của bạn không đúng')</script>";
    }

}
?>