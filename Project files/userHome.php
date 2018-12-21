<link rel="stylesheet" href="ques.css">

<?php
session_start();
if(isset($_SESSION['u_id'])){
  include_once  'includes/dbconnect.php';
  $use = $_SESSION['u_id'];
  $name = $_SESSION['u_name'];
  $sql = "select status from users where u_id='$use'";
  $result = mysqli_query($conn,$sql);
  if($row = mysqli_fetch_assoc($result)){
    if($row['status']==0){
        header("Location:select.php");
        exit();
    }else{
      include_once 'header2.php';
  echo '
      <div class="container">
          <div class="sub">
             <div><!--<button name="addsub"><i class="fas fa-plus"></i></button>-->Subjects</div>
             <ul>';
               $sql  = "select * from academic where u_id = '$use'";
               $result = mysqli_query($conn,$sql);
               if($row = mysqli_fetch_assoc($result)){
                 $bid = $row["Bid"];
                 $sem = $row["sem"];
               }
               $sql2 = "select * from subjects where Bid = '$bid' and sem = '$sem'";
               $result2 = mysqli_query($conn,$sql2);
               while($row2 = mysqli_fetch_assoc($result2)){
                 $sid = $row2['Sname'];
                 echo "<li><i class='fas fa-book'></i><a href='userHome.php?sid=$sid'>".$row2["Sname"]."</a></li>";
               }
                  echo '</ul>
                </div>
                <div class="main-wall">
                    <div class="search">
                        <input type="text" name="search_ques" id="search_ques" placeholder="Search Answers">
                    </div>
                    <div class="ask">
                        <span>Didn’t find an answer to your question?</span>
                        <input id="postBtn" class="askBtn" type="submit" value="Ask Question">
                    </div>
                    <div class="askQ">
                      <form class="postform" action="includes/questionPost.inc.php" method="post" autocomplete="off">
                        <span style="margin:20px auto 10px; width:100%; display:inline-block; text-align:center;"><strong>Ask a question</strong></span>
                            <div class="title">
                                <span><strong>Title</strong></span><br>
                                <input type="text" id="questionTitle" name="title" placeholder="Enter title of your question..">
                                <div class="titleErr"><span><strong>Please enter title of your question</strong></span></div>
                            </div>
                            <div class="body">
                            <div class="containEditor">
                            <textarea class="tinymce" id="content" name="content"></textarea>
                            </div>
                            </div>
                            <div class="subject">
                              <span><strong>Subject</strong></span>
                              <input type="text" name="search_text" id="search_text" placeholder="eg. physics, chemistry " />
                              <div id="result"></div>
                              <div class="subErr"><span><strong>Please select subjects</strong></span></div>
                          </div>
                          <div class="postContainer">
                          <input id="post" type="submit" name="post" value="Post">
                          </div>
                        </form>
                    </div>';
                    echo '<div class="search_result">';
                    if(isset($_GET['sid'])){
                      $sid = $_GET['sid'];
                        $sql = "select * from questions where Sname ='$sid' ORDER BY time DESC";
                        echo '<div class="reset"><a href="userHome.php"><i class="fas fa-redo"></i>&nbsp Reset</a></div>';
                    }else{
                      $sql = "select * from questions where Sname IN (select DISTINCT s.Sname from subjects s,academic a where s.sem=a.sem and a.u_id ='$use') ORDER BY time DESC";
                    }

                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                            $title = $row['title'];
                            $sname = $row['Sname'];
                            $time = $row['time'];
                            $unqid = $row['uniqid'];
                          echo '<div class="Aques"><span><a href="question.php?uniqid='.$unqid.'">'.$title.'</span></a><br><span><i class="fas fa-book"></i>&nbsp'.$sname.'</span><br><span><i class="far fa-clock"></i>&nbsp'.time_ago($time).'</span>
                          </div>';
                      }
                    }else{
                      echo '<div class="Aques"><i class="fas fa-times"></i>&nbsp No question on this subject!</div>';
                    }

                  echo '</div></div>
            </div>
        </body>
        <script src="user.js"></script>
        </html>';
}
}
}else{
  header("Location:login.php");
  exit();
}
?>
