<?php
session_start();
$_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
include_once 'includes/dbconnect.php';
include_once 'header2.php';

if(isset($_GET['uniqid'])){
    $unid = $_GET['uniqid'];
    $sql = "select * from questions where uniqid='$unid'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
          $title = $row['title'];
          $body  = $row['body'];
          $sname = $row['Sname'];
          $qaskid = $row['u_id'];
          $time = time_ago($row['time']);
          $state = $row['state'];
          $_SESSION['qid'] = $row['qid'];
          }
          $sql1 = "select * from users where u_id='$qaskid'";
          $result1 = mysqli_query($conn,$sql1);
          if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_assoc($result1)){
              $askname = $row1['u_name'];
            }}
      echo '<div class="mainbody">
            <div class="ques">
                <div class="title1">';echo $title;echo '</div><hr style="width:95%;">
                <div class="quesBody">';echo $body; echo '</div><hr style="width:95%;">
                <div class="quesInfo"><i class="fas fa-pen"></i>&nbsp<span>'.$askname.'</span>&nbsp&nbsp&nbsp';
                if($state == 1){
                  echo '<span style="color:red;">edited</span>';
                }
                echo '&nbsp<i class="far fa-clock"></i>&nbsp'.$time.'&nbsp&nbsp
                  <i class="fas fa-book"></i><span>'.$sname.'</span>';
                  if($_SESSION['u_id'] == $qaskid){
                    echo '<div class="edit"><a name="edit" href="editQuestion.php?uniqid='.$unid.'">edit</a></div>';
                  }
                  echo '
                </div>
            </div>
            <div class="answer">
              <span><strong>Answers</strong></span>
              <div class="ans">';
              $sql = "select a.annsid, a.qid, a.u_id ,a.ansbody,a.time from answers a, questions q where q.qid = a.qid and q.uniqid='$unid'";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $var  = $row['u_id'];
                  $sql2 = "select * from users where u_id='$var'";
                  $result2 = mysqli_query($conn,$sql2);
                  if(mysqli_num_rows($result2)>0){
                    if($row2 = mysqli_fetch_assoc($result2)){
                      $ansname = $row2['u_name'];
                    }
                  }
                  echo  '<div class="newAns">';
                  echo $row['ansbody']."<br>";
                  echo "<div class='ansUser'><i class='fas fa-pen'></i><span>".$ansname."</span>&nbsp";
                  echo "&nbsp<i class='far fa-clock'></i>&nbsp".time_ago($row['time'])."</div>";
                  echo '</div>';
                }
              }else{
                echo  '<div class="newAns">';
                echo 'no answers yet!';
                echo '</div>';
              }
              echo '<form class="postform" action="includes/postans.php" method="POST"><div class="tinyCon"><textarea class="tinymce" id="content" name="content1"></textarea></div>';
              echo '<div class="posterr"><span>please enter your answer</span></div>
              <div class="post"><input type="submit" name="postans" value="Answer"></div></form>';
              echo '</div>
            </div>
        </div>';
    }

    echo '<script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script src="question.js"></script>';
}


 ?>
