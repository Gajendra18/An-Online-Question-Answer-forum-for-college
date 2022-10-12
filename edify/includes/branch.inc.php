<?php
session_start();
$usid = $_SESSION['u_id'];
if(isset($_POST['submit'])){
  include_once 'dbconnect.php';
  if($_POST['branch'] =="IT"){
    $branch = 'B1';
  }elseif ($_POST['branch'] =="CS") {
    $branch = 'B2';
  }elseif ($_POST['branch'] =="Elec") {
    $branch = 'B3';
  }elseif ($_POST['branch'] =="Electro") {
    $branch = 'B4';
  }elseif ($_POST['branch'] =="EandT") {
    $branch = 'B5';
  }
  $sem = $_POST['sem'];
  $sql = "insert into academic(u_id,Bid,sem) values('$usid','$branch','$sem')";
  mysqli_query($conn,$sql);
  $st = 1;
  $sqlup = "update users set status = '$st' where u_id = '$usid'";
  mysqli_query($conn,$sqlup);
  header("Location: ../userHome.php");
  exit();
}else{
  header("Location: ../signup.php");
  exit();
}
 ?>
