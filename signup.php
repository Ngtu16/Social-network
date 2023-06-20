<?php
include ("signup.html");
session_start();
include "phpfunction\connect.php";
if (isset($_POST['signup'])) {
    global $con;
    $first_name=htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
    $last_name=htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
    $name=$first_name .= $last_name;
    $email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    $cpass = htmlentities(mysqli_real_escape_string($con, $_POST['cpass']));
    $gender = htmlentities(mysqli_real_escape_string($con,$_POST['gender']));

    $select = "select * from users where Email='$email' and Password='$pass'";
    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Tài khoản đã tồn tại')</script>";
    }
    else{
        if($pass!=$cpass){
            echo "<script>alert('Password not matched')</script>";
        }
        else {
            $insert=" INSERT INTO users (Name,Email,Password,Gender) VALUES ('$name','$email','$pass','$gender')";
            mysqli_query($con,$insert);
        }
    }
    if(mysqli_query($con,$insert)==1)
    { echo "<script>alert('Create a successful account, Login now'),window.open('login.php', '_self')</script>";
        // echo "<script>alert('Đã tạo tài khoản thành công')</script>";
        // header('location:login.php');
    }
    
}
?>
