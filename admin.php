<?php
     require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration | PHP</title>
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
     <center>
          <div class="register">
               <?php
                    if(isset($_POST['signup'])){
                         $username = $_POST['username'];
                         $email = $_POST['email'];
                         $password = $_POST['secret'];
                         $rank = $_POST['class'];
                         $codename = $_POST['stream'];
                         $photofile = $_FILES['photo']['tmp_name'];
                         $dp = $_FILES['photo']['name'];
                         $userkey = rand(100000000, 999999999);

                         $true = false;
                         $exist = false;

                         if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                              $ip = $_SERVER['HTTP_CLIENT_IP'];
                         }
                         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                         }
                         else{
                              $ip = $_SERVER['REMOTE_ADDR'];
                         }

                         if($rank == 1 && $codename === "HM"){
                              $chkquery = "SELECT * FROM admin";
                              $chkresult = mysqli_query($db, $chkquery);

                              if($chkresult){
                                   for($i=0; $i<mysqli_num_rows($chkresult); $i++){
                                        $row = mysqli_fetch_array($chkresult);

                                        if($row['rank'] == 1 && $row['codename'] === "HM"){
                                             $exist = true;
                                             break;
                                        }
                                   }
                              }

                              if(!$exist){
                                   $true = true;
                              }

                         }
                         elseif($rank == 2 && $codename === "DHM"){
                              $chkquery = "SELECT * FROM admin";
                              $chkresult = mysqli_query($db, $chkquery);

                              if($chkresult){
                                   for($i=0; $i<mysqli_num_rows($chkresult); $i++){
                                        $row = mysqli_fetch_array($chkresult);

                                        if($row['rank'] == 2 && $row['codename'] === "DHM"){
                                             $exist = true;
                                             break;
                                        }
                                   }
                              }

                              if(!$exist){
                                   $true = true;
                              }
                         }
                         elseif($rank == 3 && $codename === "AM"){
                              $chkquery = "SELECT * FROM admin";
                              $chkresult = mysqli_query($db, $chkquery);

                              if($chkresult){
                                   for($i=0; $i<mysqli_num_rows($chkresult); $i++){
                                        $row = mysqli_fetch_array($chkresult);

                                        if($row['rank'] == 3 && $row['codename'] === "AM"){
                                             $exist = true;
                                             break;
                                        }
                                   }
                              }

                              if(!$exist){
                                   $true = true;
                              }
                         }
                         elseif($rank == 4 && $codename === "DM"){
                              $chkquery = "SELECT * FROM admin";
                              $chkresult = mysqli_query($db, $chkquery);

                              if($chkresult){
                                   for($i=0; $i<mysqli_num_rows($chkresult); $i++){
                                        $row = mysqli_fetch_array($chkresult);

                                        if($row['rank'] == 4 && $row['codename'] === "DM"){
                                             $exist = true;
                                             break;
                                        }
                                   }
                              }

                              if(!$exist){
                                   $true = true;
                              }
                         }
                         elseif($rank == 5 && $codename === "TEA"){
                              $true = true;
                         }
                         elseif($rank == 7 && $codename === "PRGM"){
                              $true = true;
                         }
                         
                         if($true){
                              if($photofile == ""){
                                   $profile = 'media/images/prof_pics/login.png';
                                   echo $profile;
                                   echo "<br>";
                              }
                              else{
                                   $profile = 'media/images/prof_pics/' . $dp;
                                   $foldername = "media/images/prof_pics/" . $dp;
                                   move_uploaded_file($file, $foldername);
                              }
     
                              $query = "SELECT * FROM admin";
     
                              $reference = mysqli_query($db, $query);
     
                              if($reference){
                                   for($i=0; $i<mysqli_num_rows($reference); $i++){
                                        $row = mysqli_fetch_array($reference);
     
                                        if($userkey === $row['userkey']){
                                             $userkey = rand(100000000, 999999999);
                                        }
                                   }
                              }
     
                              $sql = "INSERT INTO admin (username, email, password, rank, codename, photo, userkey, security) VALUES (?,?,?,?,?,?,?,?)";
                              $stmtinsert = $db->prepare($sql);
                              $result = $stmtinsert->execute([$username, $email, $password, $rank, $codename, $profile, $userkey, $ip]);
                              if($codename === "TEA" || $codename === "DM"){
                                   header("location:teacher.php?uname=".$userkey);
                              }
                              else{
                                   if($result){
                                        echo "<p>Successfully registered.</p><br>";
                                        header('location:home.php?uname='.$userkey);
                                   }
                                   else{
                                        echo "<p>There were errors while saving the data.</p>";
                                   }    
                              }
                         }
                         else{
                              echo "<p>Rank or codename incorrect!</p>";
                         }
                    }
               ?>
          </div>
     </center>
     <script src="timer.js"></script>
</body>
</html>