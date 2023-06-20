<?php 
session_start();
include ("phpfunction\connect.php");
// include("function-php/info-user.php");
// include("function-php/posts.php");
$user = $_SESSION['Email'];
$get_user = "select * from users where Email='$user'"; 
$run_user = mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);			
$user_id = $row['user_id']; 
$user_name = $row['Email'];		
$user_pass = $row['Password'];
$Name = $row['Name'];		
$user_gender = $row['Gender'];
//Truy xuất vào ảnh avartar
$get_profile_pic = "select * from user_profile_pic where user_id='$user_id'";
$run_profile_pic = mysqli_query($con,$get_profile_pic); 
$row=mysqli_fetch_array($run_profile_pic);	
$image= $row['image']; 	
$image_path = "avatar_user/".$image;

// $image= "'avatar_user/user1.jpg'"; 	
//Truy xuất vào ảnh bìa	
$get_cover_pic = "select * from user_cover_pic where user_id='$user_id'";
$run_cover_pic = mysqli_query($con,$get_cover_pic); 
$row_cover=mysqli_fetch_array($run_cover_pic);	
$imgcv= $row_cover['image']; 
$imgcover="images/".$imgcv;	
// echo $imgcover; 
// $cv="'images/Background.jpg'";
// echo $cv;

// $user_posts = "select * from user_post where user_id='$user_id'"; 
// $run_posts = mysqli_query($con,$user_posts); 
// $posts = mysqli_num_rows($run_posts);

if (isset($_POST['logout'])) {
    // unset($_SESSION['user_name']);
    echo "<script>window.open('login.php', '_self')</script>";
}
include("profile.html");

?>