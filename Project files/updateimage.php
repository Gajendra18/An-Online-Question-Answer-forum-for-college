<?php
session_start();
include 'includes/dbconnect.php';
  $uid= $_SESSION['u_id'];
  $file = $_FILES['profileimage'];
  $filename = $file['name'];
  $tmpname = $file['tmp_name'];
  $error = $file['error'];
  $filesize = $file['size'];
  $filetype = $file['type'];

$fileExt = explode('.',$filename);
$fileActExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png');

$sql = "select * from users where u_id = '$uid'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
  while($row = mysqli_fetch_assoc($result)){
    $prevFile  = $row['profileLoc'];
  }
}

if(in_array($fileActExt,$allowed)){
  if($error == 0){
    $filenameNew = uniqid('',true).".".$fileActExt;
    $fileDestination = "userProfile/".$filenameNew;
    $sql = "update users set profileLoc = '$fileDestination' where u_id = '$uid'";
    mysqli_query($conn,$sql);
    move_uploaded_file($tmpname,$fileDestination);
    if($prevFile != "userProfile/default_user_icon.png"){
    unlink($prevFile);
  }
  $return = array('path' => $fileDestination,'error' => 0);
    echo json_encode($return);

  }else {
$return = array('path' => $prevFile,'error' => 1);
    echo json_encode($return);

  }
}
?>
