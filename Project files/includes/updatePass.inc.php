<?php

if(isset($_POST['submit'])){
  include_once 'dbconnect.php';
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $hash = password_hash($pass,PASSWORD_DEFAULT);
  $sql = "update users set u_password = '$hash' where u_email='$email'";
  mysqli_query($conn,$sql);
  header("Location:../login.php");
  exit();
}else{
  header("Location:../login.php");
  exit();
}




 ?>
