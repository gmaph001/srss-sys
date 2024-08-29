<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="register">
          <?php

               require_once "config.php";

               if(isset($_POST['login'])){

                    $username = $_POST['uname'];
                    $email = $_POST['email'];
                    $password = $_POST['pass'];

                    $query = "SELECT * FROM students";
                    $query2 = "SELECT * FROM admin";

                    $result = mysqli_query($db, $query);
                    $result2 = mysqli_query($db, $query2);

                    $validate = true;
                    $validate2 = true;
                    $validate3 = true;

                    if($result2){
                         for($i=0; $i<mysqli_num_rows($result2); $i++){
                              $row = mysqli_fetch_array($result2);

                              if($username === $row['username']){
                                   if($email === $row['email']){
                                        if($password === $row['password']){
                                             $uname = $row['userkey'];
                                             echo "Login successfully!";
                                             header("location: request.php?uname=$uname");
                                        }
                                        else{
                                             $validate = false;
                                        }
                                   }
                                   else{
                                        $validate2 = false;
                                   }
                              }
                              else{
                                   $validate3 = false;
                              }
                         }
                    }
                    else{
                         if($result){
                              for($i=0; $i<mysqli_num_rows($result); $i++){
                                   $row = mysqli_fetch_array($result);
               
                                   if($username === $row['username']){
                                        if($email === $row['email']){
                                             if($password === $row['password']){
                                                  $uname = $row['userkey'];
                                                  echo "Login successfully!";
                                                  header("location: request.php?uname=$uname");
                                             }
                                             else{
                                                  $validate = false;
                                             }
                                        }
                                        else{
                                             $validate2 = false;
                                        }
                                   }
                                   else{
                                        $validate3 = false;
                                   }
                              }
                         }
                         else{
                              echo "User not found!";
                         }
                    }

                    if(!$validate){
                         echo "<p>Incorrect password!</p>";
                    }
                    else{
                         if(!$validate2){
                              echo "<p>Incorrect email!</p>";
                         }
                         else{
                              if(!$validate3){
                                   echo "<p>Incorrect username!</p>";
                              }
                         }
                    }
               }
          ?>
     </div>
</body>
</html>