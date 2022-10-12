
<?php
include_once 'header2.php';
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edify | login </title>
    <link href="landing.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script src="question.js"></script>
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
    <style media="screen">
    html{
        background: url(img/book.jpg) no-repeat center fixed;
        background-size: cover;
    }
      .wrap{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        display: block;

      }

      .container{
        position: relative;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
        border-radius: 5px;
        width: 400px;
        box-sizing: border-box;
        padding: 10px;
        background: #fff;
        display: block;
      }

      .heading{
          text-align: center;
          margin: 15px auto;
      }

      .text{
        margin: 15px auto;
      }

      .inputEmail input{
        margin: 10px auto;
        width: 80%;
        padding: 5px;
        font-size: 16px;
        border-style: solid;
        border: 1px solid #111;
        border-radius: 5px;
      }
      input[type=submit]{
        margin: 8px auto 15px;
        padding: 5px 10px;
        color: #fff;
        background: #009ee0;
        border: none;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
      }

      .uploadSuccess,.uploadErr{
        position: absolute;
        left: 50%;
        top: 80px;
        transform: translateX(-50%);
        z-index: 7;
        background: #f0fff0;
        padding: 10px 20px;
        color: #44bd32;
        border:1px solid #44bd32;
        border-radius: 5px;
        display: none;
      }

      .uploadErr{
        background: #FAC7C7;
        color: #e74c3c;
        border:1px solid #e74c3c;
      }

    </style>
  </head>
  <body>

    <div class="uploadSuccess"><span>The mail has been sent successfully</span></div>
    <div class="uploadErr"><span>There was an error. Please try again</span></div>
    <?php
    if(isset($_GET['success']) && $_GET['success']=='true'){
      echo '<script type="text/javascript">
      $(".uploadSuccess").fadeIn("slow", function(){
           $(".uploadSuccess").delay(5000).fadeOut();
        });

      </script>';
        echo '<script>window.setTimeout(function(){window.location = "http://localhost/IP%20Project/forgotPassword.php"},5000);</script>';



    }elseif (isset($_GET['error']) && ($_GET['error']=='email' || $_GET['error']=='send')) {
      echo '<script type="text/javascript">
      $(".uploadErr").fadeIn("slow", function(){
           $(".uploadErr").delay(5000).fadeOut();
        });
      </script>';
      echo '<script>window.setTimeout(function(){window.location = "http://localhost/IP%20Project/forgotPassword.php"},5000);</script>';
    }


     ?>

    <div class="wrap">
      <div class="container">
          <div class="heading">
            <h1>Forgot Password?</h1>
          </div>
          <div class="text">
            <span>Please enter your email address below and we will send you information to change your password.</span>
          </div>
            <form class="" action="includes/forget.inc.php" method="post">
              <div class="inputEmail">
                <span><strong>Email Adderss :</strong></span><br>
                <input type="text" name="email" value="" placeholder="Enter your email...">
              </div>
                <input type="submit" name="submit" value="submit">
            </form>
      </div>
    </div>
  </body>
</html>
