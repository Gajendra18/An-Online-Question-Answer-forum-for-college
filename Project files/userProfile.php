<?php session_start();
if(isset($_SESSION['u_id'])){
  include_once 'includes/dbconnect.php';
  $uid  = $_SESSION['u_id'];
  include_once 'header2.php';
  include_once 'includes/dbconnect.php';
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="userProfile.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <title></title>
    <style media="screen">
    .upload-btn-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin-bottom: 15px;
      border: 1px solid lightgray;
      padding: 5px 10px;
      border-radius: 8px;

    }

    label{

      background-color: white;
      padding: 5px 10px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;

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

input[type="file"] {
    display: none;
}
    </style>
  </head>
  <body>
    <div class="uploadSuccess"><span>Your profile has been successfully updated</span></div>
    <div class="uploadErr"><span>There was an error updating your profile. Please try again</span></div>
      <div class="contain">
        <div class="main">
          <div class="cover">
            <div class="card">
              <div class="profile">
                <div id="pImage">
                <img  src="<?php
                echo $proloc;
                 ?>" alt="<?php echo $_SESSION['u_name']; ?>" ></div>
                <form class="updateimageForm" action="" method="post" enctype="multipart/form-data">
                <div class="upload-btn-wrapper">
                  <label for="myfile"> Upload Profile
                    <input type="file" id="myfile" name="profileimage">
                  </label>
                </div>
              </form>
                </div>
                  <?php
                  $sql = "select * from users where u_id = '$uid'";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)){
                    if($row = mysqli_fetch_assoc($result)){
                      $uname = $row['u_name'];
                      $email = $row['u_email'];
                      $userName = $row['u_username'];
                      echo "<span>Name</span><div class='value'>$uname</div>";
                      echo "<span>UserName</span><div class='value'>$userName</div>";
                      echo "<span>Email</span><div class='value'>$email</div>";
                    }
                  }
                   ?>
            </div>
          </div>
          <div class="update">
              <div class="tagname"><span><strong>Information</strong></span></div>
              <div class="profileMenu">
                <div class="userP">Profile</div>
                <div class="userQ">your question</div>
              </div>
              <div class="information">
                <div class="edit"><i class="far fa-edit"></i>&nbspedit profile</div><div class="cancel"><i class="far fa-times-circle"></i>&nbsp<a href="userProfile.php">cancel</a></div>
                <?php
                $sql = "select * from users where u_id = '$uid'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)){
                  if($row = mysqli_fetch_assoc($result)){
                    $sql1 = "select b.Bname , a.Bid,a.sem from branch b, academic a where b.Bid = a.Bid and a.u_id ='$uid'";
                    $result1 = mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)){
                      if($row1 = mysqli_fetch_assoc($result1)){
                        $branch = $row1['Bname'];
                        $sem = $row1['sem'];
                        $uname = $row['u_name'];
                        $email = $row['u_email'];
                        $userName = $row['u_username'];
                        echo "<form class='normal' action='includes/updateProfile.php' method='post'>";
                        echo "<div class='value'><span>Name : </span><input type='text' name='name' value=".$uname." disabled></div>";
                        echo "<div class='value'><span>Username : </span><input type='text' name='username' value=".$userName." disabled></div>";
                        echo "<div class='value'><span>Email : </span><input type='text' name='email' id='email' value=".$email." disabled></div>";
                        echo "<div class='value'><span>Branch : </span><strong>".$branch."</strong></div>";
                        echo "<div class='value'><span>Sem : </span><select class='semNO' name='sem' disabled>
                          <option value='sem1' >sem 1</option>
                          <option value='sem2'>sem 2</option>
                          <option value='sem3'>sem 3</option>
                          <option value='sem4'>sem 4</option>
                          <option value='sem5'>sem 5</option>
                          <option value='sem6'>sem 6</option>
                          <option value='sem7'>sem 7</option>
                          <option value='sem8'>sem 8</option>
                        </select></div>
                        <div class='normalerr'>Please fill all fields!</div>
                        ";
                        echo "<div class='password'><i class='fas fa-redo'></i>&nbspchange password?</div>
                        <div class='cancel1'><i class='far fa-times-circle'></i>&nbsp<a href='userProfile.php'>cancel</a></div>
                        <div class='value pwd'>
                        <span>Password : </span><input type='password' name='password'  id='password' value='' readonly>
                        </div>";
                        echo '<div class="updbtn">
                          <button type="submit" name="update">Update</button>
                        </div>
                        </form>';
                        echo '<script>
                        $("option").each(function(){
                           if($(this).val() == "'.$sem.'"){
                             $(this).prop("selected",true);
                           }
                         });
                        </script>';
                      }
                    }
                  }
                }
                 ?>

              </div>
              <div class="yourQuestions">
                <?php
                $sql = "select * from questions where u_id = '$uid' ORDER BY time DESC";
                $result  = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $sname = $row['Sname'];
                    $time = $row['time'];
                    $unqid = $row['uniqid'];
                  echo '<div class="Aques"><span><a href="question.php?uniqid='.$unqid.'">'.$title.'</span></a><br><span><i class="fas fa-book"></i>&nbsp'.$sname.'</span><br><span><i class="far fa-clock"></i>&nbsp'.time_ago($time).'</span>
                  </div>';
                  }
                }
                 ?>
              </div>
          </div>
        </div>
      </div>
      <script src="profile.js" charset="utf-8"></script>
  </body>
</html>
