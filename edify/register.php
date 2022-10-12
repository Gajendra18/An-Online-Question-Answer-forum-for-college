<?php
$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
<!doctype html>
<head>
<title>edify | Register </title>
<link href="login.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package/favicon-16x16.png">
    <link rel="manifest" href="img/favicon_package/site.webmanifest">
    <link rel="mask-icon" href="img/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<style>
.container{
  margin-top: 50px;
  width:330px;
}

.email .alert::after{
	bottom: 35px;
}

.email .alert::before{
	bottom: 30px;
}

.username,.password,.fullname,.email{
margin:22px auto;
}

@media screen and (max-width:400px){
  .container{
                  width:110%;
          }
           input{
                   width:80%;
                   margin:5px 0 5px 5px;
                   font-size: 16px;
                }

}

.side-nav{
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: #009ee0;
  overflow-x: hidden;
  transition: 0.2s ease-out;
  padding-top:60px;
  text-align:left;
}

.side-nav a:nth-child(2){
    margin-top:40px;
}
.side-nav a{
    padding: 7px 10px 10px 7px;
    text-decoration: none;
    font-size: 18px;
    color: #f5f6fa;
    display: block;
    transition: 0.3s;
    margin-left:5px;
  }
  .side-nav a:hover,.sideOut button:hover{
    color:#fff;
  }

  .side-nav .btn {
        padding-top:60px;
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 50px;
        margin-left: 50px;
        }


</style>
<script>
$(document).ready(function(){

$(".open a").click(function(){
$("#side-menu").css({width:"220px"});
});

$(".btn").click(function(){
$("#side-menu").css({width:"0"});

});

});
</script>
</head>
<body>
<div id="side-menu" class="side-nav">
  <a href="javascript:void(0)" class="btn">&times;</a>
  <a  href="index.php">Home</a>
  <a  href="about.php">About us</a>
  <a  href="login.php">Log in</a>
  <a  href="register.php">Sign up</a>
</div>
<header>
<span class="open">
  <a>
          <i class="fas fa-bars"></i>
  </a>
  </span>
      <div class="wname"><img src="img/edify.png" alt="edify"></div>
      <div class="navbar">
          <nav>
              <a class="menu" href="index.php">Home</a>
              <a class="menu" href="about.php">About us</a>
              <a class="menu" href="login.php">Log in</a>
              <a class="menu" href="register.php">Sign up</a>
          </nav>
      </div>
  </header>
<div class="wrap">
	<form class="myform" onsubmit="return validateForm()" action="includes/register.inc.php" method="POST" autocomplete="off">
	<div class="container">
		<span class="signup"><strong>Sign Up</strong></span>
		<div class="content">
				<div class="fullname">
					<span class="name">Name</span>
					<span class="icon"><i class="fas fa-user"></i></span>
          <?php if(isset($_GET['name'])){
            $name = $_GET['name'];
            echo '<input id="name" type="text" name="fullname" placeholder="Enter your name" value="'.$name.'">';
            echo '<script>document.getElementsByClassName("name")[0].style.color="#000";
                          document.getElementsByClassName("icon")[0].style.color="#009ee0";
                  </script>';
          }
          else{
            echo '<input id="name" type="text" name="fullname" placeholder="Enter your name">';
          }
           ?>
					<span class="bottom"></span>
					<span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter your name</span>
				</div>
				<div class="email">
					<span class="name">Email</span>
					<span class="icon"><i class="fas fa-envelope"></i></span>
          <?php if(isset($_GET['email'])){
            $email = $_GET['email'];
            echo '<input id="email" type="text" name="email" placeholder="Enter your email" value="'.$email.'">';
            echo '<script>document.getElementsByClassName("name")[1].style.color="#000";
                          document.getElementsByClassName("icon")[1].style.color="#009ee0";
                  </script>';
          }
          else{
            echo '<input id="email" type="text" name="email" placeholder="Enter your email" >';
          }
           ?>
					<span class="bottom"></span>
          <?php
          if(strpos($fullurl,"error=Emailexists")==true){
            echo '<script>document.getElementsByClassName("err")[1].style.display="none";</script>';
            echo '<span class="not-valid err" style="opacity:1;"><i class="fas fa-exclamation-circle"></i> Email already exists</span>';
          }else{
            echo '<span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter a valid email address</span>';
          }
           ?>
        </div>
        <div class="username">
					<span class="name">Username</span>
					<span class="icon"><i class="fas fa-users"></i></span>
          <?php if(isset($_GET['user'])){
            $user = $_GET['user'];
            echo '<input id="username" type="text" name="username" placeholder="Enter your username" value="'.$user.'" >';
            echo '<script>document.getElementsByClassName("name")[2].style.color="#000";
                          document.getElementsByClassName("icon")[2].style.color="#009ee0";
                  </script>';
          }
          else{
            echo '<input id="username" type="text" name="username" placeholder="Enter your username" >';
          }
           ?>
					<span class="bottom"></span>
          <?php
          if(strpos($fullurl,"error=UsenameExists")==true){
            echo '<script>document.getElementsByClassName("err")[2].style.display="none";</script>';
            echo '<span class="not-valid err" style="opacity:1;"><i class="fas fa-exclamation-circle"></i> Username already exists</span>';
          }
          else{
            echo '<span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter valid username</span>';
          }
           ?>
				</div>
				<div class="password">
					<span class="name">Password</span>
					<span class="icon"><i class="fas fa-unlock-alt"></i></span>
					<input id="pass1" class="pass" type="password" name="password" placeholder="Enter your password">
					<span class="bottom"></span>
					<span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter a valid password</span>
        </div>
        <div class="sigbut"><button type="submit" name="submit">Register</button></div>
			</div>
		</div>
	</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
$(document).ready(function(){
  $('input').focus(function(){
    $(this).prev().css({color:'#009ee0'});
    $(this).prev().prev().css({color:'#000'});
    $('input').keyup(function(){
      if($(this).val().length > 0){
      $(this).parent().find('.err').css({opacity:'0'});
    }
  });
  });
  $('input').blur(function(){
    if($(this).val().trim()==''){
    $(this).prev().css({color:'#adadad'});
    $(this).prev().prev().css({color:'#adadad'});
  }
  });
});

function validateForm(){
  var count =0;
			var fullname=document.getElementById('name').value.trim();
				var email=document.getElementById('email').value.trim();
        var username=document.getElementById('username').value.trim();
				var password=document.getElementById('pass1').value.trim();
				if(fullname == '' && email == '' && username == '' && password =='')
				{
					document.getElementsByClassName('err')[0].style.opacity='1';
					document.getElementsByClassName('err')[1].style.opacity='1';
					document.getElementsByClassName('err')[2].style.opacity='1';
          document.getElementsByClassName('err')[3].style.opacity='1';
					return false;
				}
				if(fullname=='')
				{
					document.getElementsByClassName('err')[0].style.opacity='1';
          count++;
				}
        var checkName  = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
        if(!checkName.test(fullname) && fullname!=""){
				document.getElementsByClassName('err')[0].style.opacity='1';
        count++;
				}
				var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if(email=='')
				{
					document.getElementsByClassName('err')[1].style.opacity='1';
          count++;
				}
				if(!filter.test(email) && email!=""){
				document.getElementsByClassName('err')[1].style.opacity='1';
        count++;
				}
        var ck_username = /^[A-Za-z0-9_]{3,20}$/;
        if(username=='')
				{
					document.getElementsByClassName('err')[2].style.opacity='1';
          count++;
				}
        if(!ck_username.test(username) && username!=""){
				document.getElementsByClassName('err')[2].style.opacity='1';
        count++;
				}
        var Pcheck=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
				if(password == '')
				{
					document.getElementsByClassName('err')[3].style.opacity='1';
          count++;
				}
        if(!Pcheck.test(password) && password!=""){
				document.getElementsByClassName('err')[3].style.opacity='1';
        count++;
				}
        if(count>0){
          return false;
        }
		}
</script>
</body>
</html>
