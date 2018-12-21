<?php
session_start();
if(isset($_POST['postans'])){
  include_once 'dbconnect.php';
  if(isset($_SESSION['u_id'])){
      $qid = $_SESSION['qid'];
      $uid = $_SESSION['u_id'];
      $ansbody = mysqli_real_escape_string($conn,$_POST['content1']);
      $sql = "insert into answers(qid,u_id,ansBody) values('$qid','$uid','$ansbody')";
      mysqli_query($conn,$sql);
      $sql2 = "select * from questions where qid = '$qid'";
      $result = mysqli_query($conn,$sql2);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $quid = $row['u_id'];
          $uniq = $row['uniqid'];
        }
        if($uid != $quid){
          $status = 0;
          $sql3 = "insert into notification(recid,senid,qid,status,uniqid) values('$quid','$uid','$qid','$status','$uniq')";
          mysqli_query($conn,$sql3);
        }
      }
      header("Location:".$_SESSION['rdrurl']);
      exit();
  }else{
    header("Location:../login.php");
    exit();
  }
}else{
 header("Location:../userHome.php");
  exit();
}

 ?>
