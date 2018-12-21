<?php

function generateRandomString($length = 20) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++)
                {
                      $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
    return md5($randomString);
}

function send_mail($to, $token){
require("../PHPMailer-master/src/PHPMailer.php");
require("../PHPMailer-master/src/SMTP.php");
require("../PHPMailer-master/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your mail address';     // ENter your e-mail address
$mail->Password = 'your password';      // ENter your e-mail password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->From = 'your mail address';  // ENter your e-mail address
$mail->FromName = 'Edify';
$mail->addAddress($to);
$mail->addReplyTo('your mail address', 'Reply');  // ENter your e-mail address
$mail->isHTML(true);

$mail->Subject = 'Password Recovery Instruction';
$link = 'http://localhost/IP%20Project/resetPassword.php?email='.$to.'&token='.$token;
$mail->Body= "<b>Hello</b><br><br>You have requested for your password recovery.<a href='$link' target='_blank'>Click here</a> to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br><i>". $link."</i>";

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()){
return 'fail';
}else{
return 'success';
}
}

if(isset($_POST['submit']))
{
include_once 'dbconnect.php';

$email = strtolower(mysqli_real_escape_string($conn,$_POST['email']));

$sql = "select * from users where u_email = '$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
      $uid = $row['u_id'];
    }
    $token = generateRandomString();
    $sql = "insert INTO recovery_keys(u_id, token) VALUES('$uid', '$token')";
    $query = mysqli_query($conn,$sql);
    if($query)
    {
        $send_mail = send_mail($email, $token);
        if($send_mail == 'success'){
          header("Location:../forgotPassword.php?success=true");
          exit();
        }else{
          header("Location:../forgotPassword.php?error=send");
          exit();
        }
    }
}else {
  header("Location:../forgotPassword.php?error=email");
  exit();
}
}else {
  header("Location:../forgotPassword.php");
  exit();
}
?>
