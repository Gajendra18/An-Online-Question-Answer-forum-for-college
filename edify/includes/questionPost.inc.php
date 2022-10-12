<?php
session_start();
if(isset($_POST['post'])){
  include_once 'dbconnect.php';
  $useid = $_SESSION['u_id'];
  $content = mysqli_real_escape_string($conn,$_POST['content']);
  $content = str_replace('<img src="','<img src="http://localhost/IP%20Project/',$content);
  $title = $_POST['title'];
  $sub = $_POST['selectSub'];
  $unique = uniqid();
  $state = 0;
  $sql= "insert into questions(u_id,title,body,Sname,uniqid,state) values('$useid','$title','$content','$sub','$unique','$state')";
  if(mysqli_query($conn,$sql)){
  header("Location:../question.php?uniqid=$unique");
  exit();}
}elseif (isset($_POST['edit'])) {
  include_once 'dbconnect.php';
  $useid = $_SESSION['u_id'];
  $unique = $_SESSION['qunid'];
  $content = mysqli_real_escape_string($conn,$_POST['content']);
  $content = str_replace('<img src="','<img src="http://localhost/IP%20Project/',$content);
  $title = $_POST['title'];
  $state = 1;
  $sql = "update questions set title='$title',body = '$content', state = '$state' where uniqid = '$unique'";
  mysqli_query($conn,$sql);
  header("Location:../question.php?uniqid=$unique");
  exit();
}

else{
  header("Location:../UserHome.php");
  exit();
}

 ?>
