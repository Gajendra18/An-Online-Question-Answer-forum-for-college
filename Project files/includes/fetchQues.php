<?php
include_once '../timeago.php';
session_start();

$uid = $_SESSION['u_id'];
//fetch.php
include_once 'dbconnect.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "select * from questions WHERE title LIKE '%".$search."%' OR body LIKE '%".$search."%' OR Sname LIKE '%".$search."%' ORDER BY time DESC";
}
else
{
  $query = "select * from questions where Sname IN (select DISTINCT s.Sname from subjects s,academic a where s.sem=a.sem and a.u_id ='$uid') ORDER BY time DESC";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
   $title = $row['title'];
   $sname = $row['Sname'];
   $time = $row['time'];
   $unqid = $row['uniqid'];
  $output .= '
  <div class="Aques"><span><a href="question.php?uniqid='.$unqid.'">'.$title.'</span></a><br><span><i class="fas fa-book"></i>&nbsp'.$sname.'</span><br><span><i class="far fa-clock"></i>&nbsp'.time_ago($time).'</span>
  </div>
  ';
 }
 echo $output;
}
else
{
 echo '<div class="Aques"><i class="fas fa-times"></i>&nbsp Data Not Found</div>';
}
