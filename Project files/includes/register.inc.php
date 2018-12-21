<?php

session_start();

if(isset($_POST['submit'])){
  include 'dbconnect.php';
    $name = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = strtolower(mysqli_real_escape_string($conn,$_POST['email']));
    $user = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $ckemail = "select * from users where u_email='$email'";
    $result  = mysqli_query($conn,$ckemail);
    if(mysqli_num_rows($result) > 0){
      $emailErr = true;
      header("Location: ../register.php?error=Emailexists&name=$name&user=$user");
      exit();
    }else{
    $ckuser = "select * from users where u_username='$user'";
    $result = mysqli_query($conn,$ckuser);
      if(mysqli_num_rows($result) > 0){
        $userErr = true;
        header("Location: ../register.php?error=UsenameExists&name=$name&email=$email");
        exit();
      }else{
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        $status = 0;
        $ps = 0;
        $proloc = "userProfile/default_user_icon.png";
        $sql = "insert into users(u_name,u_email,u_username,u_password,status,profileLoc) values('$name','$email','$user','$hashedPwd','$status','$proloc');";
        mysqli_query($conn,$sql);
        $ses = "select * from users where u_username='$user'";
        $result = mysqli_query($conn,$ses);
        if($row = mysqli_fetch_assoc($result)){
        $_SESSION['u_id'] = $row['u_id'];
        $_SESSION['u_name'] = $row['u_name'];
      }
        header("Location: ../select.php");
        exit();
      }
    }
  }
 ?>
