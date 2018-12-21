<?php
session_start();
if(isset($_POST['submit'])){
  include_once 'dbconnect.php';
  $user = $_POST['username'];
  $pwd = $_POST['password'];

  $sql = "select * from users where u_username = '$user'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) < 1){
    header("Location:../login.php?login=error");
    exit();
  }else {
    if($row = mysqli_fetch_assoc($result)){
      $check  = password_verify($pwd,$row['u_password']);
      if($check == false){
        header("Location:../login.php?login=error");
        exit();
      }elseif ($check == true) {
          $_SESSION['u_id'] = $row['u_id'];
          $_SESSION['u_name'] = $row['u_name'];
          if(isset($_SESSION['rdrurl'])){
            header("Location:".$_SESSION['rdrurl']);
            exit();
          }else{
          header("Location:../select.php");
          exit();
        }
    }
  }
}
}else{
  header("Location:../login.php");
  exit();
}

 ?>
