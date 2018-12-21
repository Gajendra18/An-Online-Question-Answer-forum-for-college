<?php
session_start();
if(isset($_SESSION['u_id'])){
  header("Location:userHome.php");
  exit();
}else {
  echo '
  <!doctype html>
  <head>
  <title>edify | login </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="login.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package/favicon-16x16.png">
      <link rel="manifest" href="img/favicon_package/site.webmanifest">
      <link rel="mask-icon" href="img/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#ffffff">
  	<meta name="theme-color" content="#ffffff">
  	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <style media="screen">
    .username{
      margin: 20px auto 30px;
    }

    .new{
      width: 100%;
      text-align: center;
    }

    .new a{
      text-decoration: none;
      color: #009ee0;
    }

    .loginErr{
      position: absolute;
      left: 50%;
      top: 80px;
      transform: translateX(-50%);
      z-index: 7;
      background: #FAC7C7;
      padding: 10px 20px;
      color: #e74c3c;
    border:1px solid #e74c3c;
      border-radius: 5px;
      display: none;
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
    <div class="loginErr"><span>Wrong Username or Password!</span></div>';
    if(isset($_GET['login'])){
      echo '<script type="text/javascript">
      $(".loginErr").fadeIn("slow", function(){
           $(".loginErr").delay(5000).fadeOut();
        });

      </script>';
      echo '<script>window.setTimeout(function(){window.location = "http://localhost/IP%20Project/login.php"},5000);</script>';
  	}
    echo '<div class="wrap">
  		<form onsubmit="return validateForm()" action="includes/login.inc.php" method="post" autocomplete="off">
  			<div class="container">
  				<span class="login"><strong>Login</strong></span>
  				<div class="username" >
  					<span class="name">Username</span>
  					<span class="icon"><i class="fas fa-user"></i></span>
  					<input id="username" type="text" name="username" placeholder="Enter your username">
  					<span class="bottom"></span>
            <span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter your username</span>

  				</div>
  				<div class="password" >
  					<span class="name">Password</span>
  					<span class="icon"><i class="fas fa-key"></i></span>
  					<input id="password" type="password" name="password" placeholder="Enter your password">
  					<span class="bottom"></span>
            <span class="not-valid err"><i class="fas fa-exclamation-circle"></i> Please enter your password</span>
  				</div>
  				<div class="logbut"><button type="submit" name="submit">Login</button></div>
  				<div class="for"><a href="forgotPassword.php">forgot your password?</a></div>
          <div class="new">Not a member yet?<a href="register.php"> Sign Up!</a></div>
  			</div>
  		</form>
  	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
    $(document).ready(function(){
      $("input").focus(function(){
        $(this).prev().css({color:"#009ee0"});
        $(this).prev().prev().css({color:"#000"});
        $("input").keyup(function(){
          if($(this).val().length > 0){
          $(this).parent().find(".err").css({opacity:"0"});
        }
      });
      });
      $("input").blur(function(){
        if($(this).val().trim()==""){
        $(this).prev().css({color:"#adadad"});
        $(this).prev().prev().css({color:"#adadad"});
      }
      });
    });

    	function validateForm(){
        var count =0;
              var username=document.getElementById("username").value.trim();
      				var password=document.getElementById("password").value.trim();
      				if(username == "" && password =="")
      				{
      					document.getElementsByClassName("err")[0].style.opacity="1";
      					document.getElementsByClassName("err")[1].style.opacity="1";
      					return false;
      				}
              if(username=="")
      				{
      					document.getElementsByClassName("err")[2].style.opacity="1";
                count++;
      				}
      				if(password == "")
      				{
      					document.getElementsByClassName("err")[3].style.opacity="1";
                count++;
      				}
              if(count>0){
                return false;
              }
      		}
      </script>
  </body>
  </html>';
}

 ?>
