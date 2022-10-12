<?php
session_start();
if(isset($_POST['update'])){
if(isset($_SESSION['u_id'])){
  include_once 'dbconnect.php';
  $uid = $_SESSION['u_id'];
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $uname = mysqli_real_escape_string($conn,$_POST['username']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $sem = mysqli_real_escape_string($conn,$_POST['sem']);
  $pass = mysqli_real_escape_string($conn,$_POST['password']);
  
  if($pass != ""){
      $hashpass = password_hash($pass,PASSWORD_DEFAULT);
      $sql = "update users set u_name = '$name',u_username='$uname',u_email='$email',u_password='$hashpass' where u_id = '$uid'";
    }elseif ($pass == "") {
      $sql = "update users set u_name = '$name',u_username='$uname',u_email='$email' where u_id = '$uid'";
    }
      mysqli_query($conn,$sql);
      $sql2 = "update academic set sem='$sem' where u_id = '$uid'";
      mysqli_query($conn,$sql2);
      header("Location:../userProfile.php");
      exit();
}else {
  header("Location:../login.php");
  exit();
}
}else{
  header("Location:../userProfile.php");
  exit();
}

 ?>
