<?php
session_start();
if(isset($_SESSION['u_id'])){
$uid = $_SESSION['u_id'];
include_once 'includes/dbconnect.php';
$sql = "select status from users where u_id='$uid'";
$result = mysqli_query($conn,$sql);
if($row = mysqli_fetch_assoc($result)){
  if($row['status']==0){
  echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>edify | select </title>
        <link href="select.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="select.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package/favicon-16x16.png">
        <link rel="manifest" href="img/favicon_package/site.webmanifest">
        <link rel="mask-icon" href="img/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <body>
        <div class="wrap">
            <form class="myform" action="includes/branch.inc.php" method="post">
                <h1>Select your branch</h1>
              <div class="main branch">
                <label for="it" class="itlabel">Information Technology<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="tile" name="branch" id="it" value="IT">

                <label for="cs" class="cslabel">Computer Engineering<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="tile" name="branch" id="cs" value="CS">

                <label for="Elec" class="Eleclabel">Electrical Engineering<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="tile" name="branch" id="Elec" value="Elec">

                <label for="Electro" class="Electrolabel">Electronics Engineering<span><i class="fas fa-check-circle"></i></span></label>

                <input type="radio" class="tile" name="branch" id="Electro" value="Electro">

                <label for="EandT" class="EnadTlabel">Electronics and Telecommunication Engineering <span><i class="fas fa-check-circle"></i></span></label>

                <input type="radio" class="tile" name="branch" id="EandT" value="EandT">

              </div>
              <div class="errorB">
                <span><i class="fas fa-exclamation-circle"></i> Please Select your branch!!</span>
              </div>
              <h1>select your Semester</h1>
              <div class="sem">
                <label for="sem1">Sem 1<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem1" name="sem" value="sem1">

                <label for="sem2">Sem 2<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem2" name="sem" value="sem2">

                <label for="sem3">Sem 3<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem3" name="sem" value="sem3">

                <label for="sem4">Sem 4<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem4" name="sem" value="sem4">

                <label for="sem5">Sem 5<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem5" name="sem" value="sem5">

                <label for="sem6">Sem 6<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem6" name="sem" value="sem6">

                <label for="sem7">Sem 7<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem7" name="sem" value="sem7">

                <label for="sem8">Sem 8<span><i class="fas fa-check-circle"></i></span></label>
                <input type="radio" class="semNo" id="sem8" name="sem" value="sem8">

              </div>
              <div class="errorS">
                <span><i class="fas fa-exclamation-circle"></i> Please Select your branch!!</span>
              </div>

              <input type="submit" name="submit" value="proceed" class="next">
            </form>
        </div></body></head>
        </html>';
  }elseif($row['status']==1){
      header("Location:userHome.php");
      exit();
  }
}
}else{
  header("Location:login.php");
  exit();
}
?>
