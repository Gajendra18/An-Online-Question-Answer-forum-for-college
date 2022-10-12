<style>
<?php include 'ques.css';
include_once 'timeago.php';
 ?>
</style>
<?php
if(isset($_SESSION['u_id'])){
  $uid = $_SESSION['u_id'];
  $sql = "select * from users where u_id = '$uid'";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $proloc = $row['profileLoc'];
  }

      echo '<!DOCTYPE html>
      <html lang="en">
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
          <script>
            $(document).ready(function(){
              notify();
            function notify(){
              if(!$(".notify").hasClass("clicked")){
              $.ajax({
                url:"notify.php",
                method:"POST",
                dataType:"json",
                success:function(result){
                  if(result.count == 0){
                    $(".count").css({opacity:"0"});
                  }else{
                    $(".count").css({opacity:"1"});
                $(".count").text(result.count);
              }
              $(".notifications").html(result.comment);
              $(".notificationsSide").html(result.comment);
                }
            });
          }
          }
              setInterval(notify,10000);

              $(".notify").click(function(){
                $(".notifications").slideToggle(200);
                $(".notificationsSide").slideToggle(200);
                $(".notify").toggleClass("clicked");
                if($(".notify").hasClass("clicked")){
                $(".count").css({opacity:"0"});
                $.ajax({
                  url:"updateNotification.php",
                  method:"POST"
                });
              }
              });
            });


          </script>
          <style>
          html {
            overflow-y: scroll;
        }
          body{
            background: #f5f6fa;
          }
          form{
            display: inline-block;
          }
          nav .menu:nth-of-type(2){
            border:none;
          }

          nav .menu:nth-of-type(2):hover{
            background:none;
            color:#009ee0;
          }
          .fa-bell{
            font-size:30px;
            color:#009ee0;
          }
          .notify{
            position:relative;
            top:8px;
            margin:0 5px;
            cursor: pointer;
          }

          .notify .count{
            position:absolute;
            background:#111;
            color:#fff;
            border-radius: 50%;
            top:-9px;
            right:-9px;
            display:inline-block;
            width:15px;
            height:15px;
            padding:3px;
            text-align:center;
            font-size:13px;
            opacity:0;
          }

        .notifications,.notificationsSide{
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width:300px;
            transition:0.3s linear;
            display:none;
          }

          .notifications a:hover,.notificationsSide a:hover{
            background-color: #ddd;
          }

        .notificationsSide a{
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            display: block;
            text-align: left;
            margin:0;
            font-size:10px;
          }

          .notifications a{
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left;
              margin:0;
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

            .side-nav a,.sideOut button{
                padding: 7px 10px 10px 7px;
                text-decoration: none;
                font-size: 18px;
                color: #ccc;
                display: block;
                transition: 0.3s;
                margin-left:5px;

            }
            .side-nav .notify{
              top:0;
              margin:0;
              width:60%;
            }

            .side-nav a:hover,.sideOut button:hover{
              color:#fff;
            }

            .side-nav #navImageSide{
            }
            .sideOut button{
              border:none;
              outline:none;
              background:none;
              cursor:pointer;
            }
            .sideOut{
              display:block;
              width:100%;
            }
            .side-nav .btn {
              padding-top:60px;
                  position: absolute;
                  top: 0;
                  right: 25px;
                  font-size: 50px;
                  margin-left: 50px;
                  }
              hr{
                color:#fff;
                width:90%;
              }



              .side-sub div{
                text-align:center;
                color:#fff;
              }
              .side-sub ul{
                list-style: none;
                text-align: left;
                padding-left: 1px;
                padding:0;
                margin:0;
              }

              .side-sub ul li{
                text-decoration: none;
                color: #f5f6fa;
                display: block;
                margin:10px 0 10px 5px;
              }

              .side-sub ul li a{
                  font-size: 15px;
                  padding:0;
              }



          </style>
          <script>
$(document).ready(function(){

    $(".open a").click(function(){
        $("#side-menu").css({width:"250px"});
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
            <a><img id="navImageSide" class="navImage" src="'.$proloc.'" style="width:80px;height:80px;border-radius:50%;"></a>
            <a href="userProfile.php">';echo $_SESSION['u_name'];echo '</a>
            <a href="index.php">Home</a>
            <div class="notify">
                <a>Notifications</a><span class="count"></span>
                <div class="notificationsSide">
                </div>
            </div>
            <form class="sideOut" action="includes/logout.php" method="post">
                <button type="submit" name="logout">Log Out</button>
            </form>
            <hr>
            <div class="side-sub">
               <div><!--<button name="addsub"><i class="fas fa-plus"></i></button>-->Subjects</div>
               <ul>';
                 $sql1  = "select * from academic where u_id = '$uid'";
                 $result1 = mysqli_query($conn,$sql1);
                 if($row1 = mysqli_fetch_assoc($result1)){
                   $bid = $row1["Bid"];
                   $sem = $row1["sem"];
                 }
                 $sql2 = "select * from subjects where Bid = '$bid' and sem = '$sem'";
                 $result2 = mysqli_query($conn,$sql2);
                 while($row2 = mysqli_fetch_assoc($result2)){
                   $sid = $row2['Sname'];
                   echo "<li><a href='userHome.php?sid=$sid'>".$row2["Sname"]."</a></li>";
                 }
                    echo '</ul>
            </div>
      </div>
          <header>
          <span class="open">
            <a href="#">
                    <i class="fas fa-bars"></i>
            </a>
        </span>
              <div class="wname"><img src="img/edify.png" alt="edify"></div>
              <div class="navbar">
                  <nav>
                      <a class="menu" href="index.php">Home</a>
                      <div class="notify">
                          <i class="fas fa-bell"></i><span class="count"></span>
                        <div class="notifications">
                        </div>
                      </div>
                     <img class="navImage" id="navImage" src="'.$proloc.'" style="width:40px;height:40px;border-radius:50%;"> <a class="menu" href="userProfile.php">';echo $_SESSION['u_name'];echo '</a>
                      <form class="" action="includes/logout.php" method="post">
                        <button type="submit" name="logout">Log Out</button>
                      </form>
                  </nav>
              </div>
          </header>';
}else{
  echo '<!DOCTYPE html>
  <html lang="en">
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

              .open{
                display:inline-block;
                top: 0;
                font-size: 30px;
                margin:auto 10px auto 30px;
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
      </header>';
}

?>
