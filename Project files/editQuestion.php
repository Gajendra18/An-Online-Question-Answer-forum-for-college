<link rel="stylesheet" href="ques.css">

<?php

session_start();
if(isset($_SESSION['u_id'])){
  include_once 'includes/dbconnect.php';
  if(isset($_GET['uniqid'])){
    $uniq = $_GET['uniqid'];
    $sql = "select * from questions where uniqid='$uniq'";
    $result =mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $body = $row['body'];
        $sname = $row['Sname'];
      }
    }
  include 'header2.php';

  echo '<style media="screen">
    .askQ{
      padding:60px 0 0 0;
      width:70%;
      margin:0 auto;
      display: block;
    }
  </style>';
  echo '<div class="askQ">
    <form class="editform" action="includes\questionPost.inc.php" method="post" autocomplete="off">
      <span style="margin:20px auto 10px; width:100%; display:inline-block; text-align:center;"><strong>Edit your question</strong></span>
          <div class="title">
              <span><strong>Title</strong></span><br>
              <input type="text" id="questionTitle" name="title" placeholder="Enter title of your question.." value="'.$title.'">
              <div class="titleErr"><span><strong>Please enter title of your question</strong></span></div>
          </div>
          <div class="body">
          <div class="containEditor">
          <textarea class="tinymce" id="content" name="content"></textarea>';
          echo '<script>
            $("#content").html("'.$body.'");
          </script>';
          echo '</div>
          </div>
          <div class="subject">
            <span><strong>Subject</strong></span>';
            echo '<br><br><i class="fas fa-book"></i><span>'.$sname.'</span>';
            echo  '

        </div>
        <div class="postContainer">';
        $_SESSION['qunid']= $uniq;
        echo '<button id="post" type="submit" name="edit">Edit</button>
        </div>
      </form>
  </div>';
}
}

 echo '<script src="user.js"></script>';
 echo '<script>
 $(".editform").submit(function(){
   if($("#questionTitle").val() == ""){
     $(".titleErr").slideDown(100);
       return false;
   }
 });
 </script>
</body>
</html>';
?>
