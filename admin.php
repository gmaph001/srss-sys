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
                         $firstname = $_POST['firstname'];
                         $secondname = $_POST['secondname'];
                         $lastname = $_POST['lastname'];
                         $username = $_POST['username'];
                         $email = $_POST['email'];
                         $password = $_POST['secret'];
                         $rank = $_POST['class'];
                         $codename = $_POST['stream'];
                         $photofile = $_FILES['photo']['tmp_name'];
                         $dp = $_FILES['photo']['name'];
                         $userkey = rand(100000000, 999999999);

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

                         $sql = "INSERT INTO admin (firstname, secondname, lastname, username, email, password, rank, codename, photo, userkey) VALUES (?,?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $rank, $codename, $profile, $userkey]);
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
               ?>
          </div>
     </center>
</body>
</html>