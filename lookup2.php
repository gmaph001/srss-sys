<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
</head>
<body>
     <div class="register">
          <?php
               if(isset($_POST['login'])){
                    $u = $_POST['uname'];
                    $p = $_POST['pass'];

                    require_once "config.php";

                    $username = mysqli_real_escape_string($db, $u);
                    $password = mysqli_real_escape_string($db, $p);

                    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                         $ip = $_SERVER['HTTP_CLIENT_IP'];
                    }
                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    }
                    else{
                         $ip = $_SERVER['REMOTE_ADDR'];
                    }

                    $query = "SELECT * FROM students";
                    $query2 = "SELECT * FROM admin";

                    $result = mysqli_query($db, $query);
                    $result2 = mysqli_query($db, $query2);

                    $valid = true;
                    $uvalid = true;
                    $evalid = true;
                    $pvalid = true;

                    $size = 0;

                    $user[$size] = [];
                    $address[$size] = [];
                    $pass[$size] = [];

                    if($result){
                         for($i=0; $i<mysqli_num_rows($result); $i++){
                              $row = mysqli_fetch_array($result);

                              $user[$size] = $row['username'];
                              $address[$size] = $row['email'];
                              $pass[$size] = $row['password'];

                              $size++;

                              if($username === $row['username'] || $username === $row['email']){
                                   if($password === $row['password']){
                                        $userkey = $row['userkey'];
                                        $queryupd = "UPDATE students SET security = '$ip' WHERE userkey = '$userkey'";
                                        $resultupd = mysqli_query($db, $queryupd);

                                        if($resultupd){
                                             header("location:home.php?uname=$userkey");
                                        }
                                   }
                                   else{
                                        $pvalid = false;
                                   }
                              }
                              else{
                                   $uvalid = false;
                              }
                         }
                    }
                    if($result2){
                         for($i=0; $i<mysqli_num_rows($result2); $i++){
                              $row = mysqli_fetch_array($result2);

                              $user[$size] = $row['username'];
                              $address[$size] = $row['email'];
                              $pass[$size] = $row['password'];

                              $size++;

                              if($username === $row['username'] || $username === $row['email']){
                                   if($password === $row['password']){
                                        $userkey = $row['userkey'];
                                        if($row['codename'] === "PRF"){
                                             $queryupd = "UPDATE admin SET security = '$ip' WHERE userkey = '$userkey'";
                                             $resultupd = mysqli_query($db, $queryupd);
     
                                             if($resultupd){
                                                  header("location:home.php?uname=$userkey");
                                             }
                                        }
                                        $queryupd = "UPDATE admin SET security = '$ip' WHERE userkey = '$userkey'";
                                        $resultupd = mysqli_query($db, $queryupd);

                                        if($resultupd){
                                             header("location:home.php?uname=$userkey");
                                        }
                                   }
                                   else{
                                        $pvalid = false;
                                   }
                              }
                              else{
                                   $uvalid = false;
                              }
                         }
                    }
                    
               }

               for($i=0; $i<$size; $i++){
                    if($username === $user[$i]){
                         $valid = true;
                         break;
                    }
                    else{
                         if($username === $address[$i]){
                              $evalid = true;
                              break;
                         }
                         else{
                              if($password === $pass[$i]){
                                   $valid = true;
                                   break;
                              }
                              else{
                                   $valid = false;
                              }
                         }
                    }
               }

               if(!$pvalid){
                    echo "<p>Invalid password!</p>";
               }
               else{
                    if(!$evalid){
                         echo "<p>Invalid email!</p>";
                    }
                    else{
                         if(!$uvalid){
                              if(!$valid){
                                   echo "<p>User not found!</p>";
                              }
                              else{
                                   echo "<p>Invalid username or email!</p>";
                              }
                         }
                    }
               }
          ?>
     </div>
</body>
</html>     