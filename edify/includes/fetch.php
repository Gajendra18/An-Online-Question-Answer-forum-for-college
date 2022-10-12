<?php

include_once 'dbconnect.php';
$output = '';
$query ='';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT DISTINCT Sname FROM subjects
  WHERE Sname LIKE '%".$search."%'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0)
  {
   $output .= '
    <div class="resultSub" style="margin:10px 0;">
   ';
   while($row = mysqli_fetch_assoc($result))
   {
        $output .= '
        <label for="'.$row["Sname"].'">'.$row["Sname"].'<span><i class="fas fa-check-circle"></i></span></label>
        <input type="radio" class="searchsub" name="selectSub" id="'.$row["Sname"].'" value="'.$row["Sname"].'">
        ';
  }
  echo $output.'</div>';
}else{
   echo 'Subject not found';
}
}



 ?>
