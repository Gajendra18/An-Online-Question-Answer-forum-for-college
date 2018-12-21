<?php

session_start();
if(isset($_SESSION['u_id'])){
    header("Location:userHome.php");
    exit();
}else {
  echo '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="landing.css">
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

      <title>edify</title>
      <style>
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
          color: #ccc;
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
        <a href="javascript:void(0)" class="btn"">&times;</a>
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
  <div class="moto">
      <div class="blur">
          <img src="img/back.jpg" alt="">
      </div>
      <div class="center"><h1><span class="l1">Expand your opportunities</span><br><span class="l2">Exceed your expectations</span></h1></div>
  </div>
  <div class="help">
      <p><span>Edify allows you to extend the interactions among students and faculty beyond the bounds of classroom walls and scheduled times</span><br><br><a class="sign" href="register.php">Sign up</a></p>
      <img src="img/web-phone.png" alt="">
  </div>
  <div class="connect">
      <img src="img/back-map.png" alt="">
      <h1>Connect, stay informed and learn no matter where you are</h1>
  </div>
  <div class="info">
      <div class="ask">
          <img src="img/icon-allcanask2.png" alt=""><br><strong>Ask your dobts</strong>
      </div>
      <div class="chat">
          <img src="img/chat2.png" alt=""><br><strong>Connect with mentor</strong>
      </div>
      <div class="know">
          <img src="img/desk-lamp2.png" alt=""><br><strong>Expand your knowledge</strong>
      </div>
  </div>
  <footer>
     <div class="copy"><h2>edify</h2>
      Copyright © 2018</div>
     <div class="social">
         <ul class="soc">
             <li><a href="#" class="icon-1 facebook" title="Facebook"><svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg></a></li>
             <li><a href="#" class="icon-2 googleplus" title="GooglePlus"><svg viewBox="0 0 512 512"><path d="M179.7 237.6L179.7 284.2 256.7 284.2C253.6 304.2 233.4 342.9 179.7 342.9 133.4 342.9 95.6 304.4 95.6 257 95.6 209.6 133.4 171.1 179.7 171.1 206.1 171.1 223.7 182.4 233.8 192.1L270.6 156.6C247 134.4 216.4 121 179.7 121 104.7 121 44 181.8 44 257 44 332.2 104.7 393 179.7 393 258 393 310 337.8 310 260.1 310 251.2 309 244.4 307.9 237.6L179.7 237.6 179.7 237.6ZM468 236.7L429.3 236.7 429.3 198 390.7 198 390.7 236.7 352 236.7 352 275.3 390.7 275.3 390.7 314 429.3 314 429.3 275.3 468 275.3"/></svg></a></li>
             <li><a href="#" class="icon-3 instagram" title="Instagram"><svg viewBox="0 0 512 512"><path d="M256 109.3c47.8 0 53.4 0.2 72.3 1 17.4 0.8 26.9 3.7 33.2 6.2 8.4 3.2 14.3 7.1 20.6 13.4 6.3 6.3 10.1 12.2 13.4 20.6 2.5 6.3 5.4 15.8 6.2 33.2 0.9 18.9 1 24.5 1 72.3s-0.2 53.4-1 72.3c-0.8 17.4-3.7 26.9-6.2 33.2 -3.2 8.4-7.1 14.3-13.4 20.6 -6.3 6.3-12.2 10.1-20.6 13.4 -6.3 2.5-15.8 5.4-33.2 6.2 -18.9 0.9-24.5 1-72.3 1s-53.4-0.2-72.3-1c-17.4-0.8-26.9-3.7-33.2-6.2 -8.4-3.2-14.3-7.1-20.6-13.4 -6.3-6.3-10.1-12.2-13.4-20.6 -2.5-6.3-5.4-15.8-6.2-33.2 -0.9-18.9-1-24.5-1-72.3s0.2-53.4 1-72.3c0.8-17.4 3.7-26.9 6.2-33.2 3.2-8.4 7.1-14.3 13.4-20.6 6.3-6.3 12.2-10.1 20.6-13.4 6.3-2.5 15.8-5.4 33.2-6.2C202.6 109.5 208.2 109.3 256 109.3M256 77.1c-48.6 0-54.7 0.2-73.8 1.1 -19 0.9-32.1 3.9-43.4 8.3 -11.8 4.6-21.7 10.7-31.7 20.6 -9.9 9.9-16.1 19.9-20.6 31.7 -4.4 11.4-7.4 24.4-8.3 43.4 -0.9 19.1-1.1 25.2-1.1 73.8 0 48.6 0.2 54.7 1.1 73.8 0.9 19 3.9 32.1 8.3 43.4 4.6 11.8 10.7 21.7 20.6 31.7 9.9 9.9 19.9 16.1 31.7 20.6 11.4 4.4 24.4 7.4 43.4 8.3 19.1 0.9 25.2 1.1 73.8 1.1s54.7-0.2 73.8-1.1c19-0.9 32.1-3.9 43.4-8.3 11.8-4.6 21.7-10.7 31.7-20.6 9.9-9.9 16.1-19.9 20.6-31.7 4.4-11.4 7.4-24.4 8.3-43.4 0.9-19.1 1.1-25.2 1.1-73.8s-0.2-54.7-1.1-73.8c-0.9-19-3.9-32.1-8.3-43.4 -4.6-11.8-10.7-21.7-20.6-31.7 -9.9-9.9-19.9-16.1-31.7-20.6 -11.4-4.4-24.4-7.4-43.4-8.3C310.7 77.3 304.6 77.1 256 77.1L256 77.1z"/><path d="M256 164.1c-50.7 0-91.9 41.1-91.9 91.9s41.1 91.9 91.9 91.9 91.9-41.1 91.9-91.9S306.7 164.1 256 164.1zM256 315.6c-32.9 0-59.6-26.7-59.6-59.6s26.7-59.6 59.6-59.6 59.6 26.7 59.6 59.6S288.9 315.6 256 315.6z"/><circle cx="351.5" cy="160.5" r="21.5"/></svg></a></li>
             <li><a href="#" class="icon-4 linkedin" title="LinkedIn"><svg viewBox="0 0 512 512"><path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"/></svg></a></li>
             <li><a href="#" class="icon-5 twitter" title="Twitter"><svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"/></svg></a></li>
          </ul>
     </div>
  </footer>
  </body>
  </html>';
}




 ?>
