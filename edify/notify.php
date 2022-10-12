<?php
session_start();
include 'includes/dbconnect.php';
include 'timeago.php';
if(isset($_SESSION['u_id'])){
  $comment="";
  $uid = $_SESSION['u_id'];
    $sql = "select * from notification where recid='$uid' and status = 0";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $sender = $row['senid'];
        $quesUid = $row['uniqid'];
        $sql2 = "select * from users where u_id = '$sender'";
        $res = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($res)){
          if($row2 = mysqli_fetch_assoc($res)){
              $comment .= "<a href='question.php?uniqid=$quesUid'>".$row2['u_name']." has answerd your question!!<br><span style='font-size:13px;'>".time_ago($row['time'])."</span></a>";
          }
        }

      }
    }else{
      $sql = "select * from notification where recid='$uid' ORDER BY time DESC LIMIT 3";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $sender = $row['senid'];
          $quesUid = $row['uniqid'];
          $sql2 = "select * from users where u_id = '$sender'";
          $res = mysqli_query($conn,$sql2);
          if(mysqli_num_rows($res)){
            if($row2 = mysqli_fetch_assoc($res)){
                $comment .= "<a href='question.php?uniqid=$quesUid'>".$row2['u_name']." has answerd your question!!<br><span style='font-size:13px;'>".time_ago($row['time'])."</span></a>";
            }
          }

        }
    }
    $count = 0;
  }

    $notifi = array('count' => $count,'comment' => $comment );
    echo json_encode($notifi);
}

?>
