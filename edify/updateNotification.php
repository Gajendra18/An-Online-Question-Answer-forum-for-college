<?php
session_start();
if(isset($_SESSION['u_id'])){
  include_once 'includes/dbconnect.php';
  $uid = $_SESSION['u_id'];
  $stat = 1;
  $sql = "update notification set status = '$stat' where recid='$uid'";
  mysqli_query($conn,$sql);
}


 ?>
