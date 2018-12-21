<?php
$connect = mysqli_connect("localhost", "root", "", "edify");

if(isset($_POST["content1"]))
{
  $new = "comment"
 $subject = mysqli_real_escape_string($connect, $new);
 $comment = mysqli_real_escape_string($connect, $_POST["content1"]);
 $query = "
 INSERT INTO comments(comment_subject, comment_text)
 VALUES ('$subject', '$comment')
 ";
 mysqli_query($connect, $query);
}
?>
