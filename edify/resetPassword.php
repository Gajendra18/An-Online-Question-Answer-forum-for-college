<style media="screen">
  <?php include 'reset.css';?>
</style>

<?php
include_once 'includes/dbconnect.php';

if(isset($_GET['email']) && isset($_GET['token'])){
$email = $_GET['email'];
$token = $_GET['token'];
$query = mysqli_query($conn, "select r.u_id,u_email,r.valid,r.token FROM recovery_keys r,users u WHERE u.u_email = '$email' AND token = '$token'");
if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)){
    if($row['valid'] == 1){
      include 'header2.php';

      echo '
        </head>
        <body>
          <div class="wrap">
            <div class="con">
                <div class="heading">
                  <h1>Reset Password</h1>
                </div>
                  <form class="" onsubmit="return validateForm()" action="includes/updatePass.inc.php" method="post">
                    <div class="inputEmail">
                      <span><strong>New password :</strong></span><br>
                      <input type="text" name="password" id="pass1" value="" placeholder="Enter your password..."><br>
                      <input type="hidden" name="email" value="'.$email.'">
                      <span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter a valid password</span>
                    </div>
                      <input type="submit" name="submit" value="submit">
                  </form>
            </div>
          </div>
        </body>
      </html>';
    }else if($row['valid'] == 0){
      echo '<div class="wrap">
        <div class="con">
            <div class="heading">
              <h1>Reset Password</h1>
            </div>
            <div class="invalidToken">
            <span>Your password reset link appears to be invalid. Please request a new link <a href="forgotPassword.php">click here</a></span>
            </div>
        </div>
      </div>';
    }
  }
}else{
  echo '<div class="wrap">
    <div class="con">
        <div class="heading">
          <h1>Reset Password</h1>
        </div>
        <div class="invalidToken">
        <span>Your password reset link appears to be invalid. Please request a new link <a href="forgotPassword.php">click here</a></span>
        </div>
    </div>
  </div>';
}
}else{
  echo '<div class="wrap">
    <div class="con">
        <div class="heading">
          <h1>Reset Password</h1>
        </div>
        <div class="invalidToken">
        <span>Your password reset link appears to be invalid. Please request a new link <a href="forgotPassword.php">click here</a></span>
        </div>
    </div>
  </div>';
}
?>

 <script>
 function validateForm(){
 var password=document.getElementById("pass1").value.trim();
 var count =0;
 var Pcheck=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
 if(password == '')
 {
   document.getElementsByClassName("err")[0].style.opacity="1";
   count++;
 }
 if(!Pcheck.test(password) && password!=""){
 document.getElementsByClassName("err")[0].style.opacity="1";
 count++;
 }
 if(count>0){
   return false;
 }
}
 </script>
