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

               require_once('config.php');

               $username = $_POST['username'];
               $email = $_POST['email'];
               $password = $_POST['pass'];

               $query = "SELECT * FROM admin";

               $result = mysqli_query($db, $query);

               $validation;

               if(mysqli_num_rows($result) > 0){
                    for($i = 0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);
                         if($row['username'] === $username && $row['email'] === $email && $row['password'] === $password){
                              $userkey = $row['userkey'];
                              $validation = true;
                              break;
                         }
                         else{
                              $validation = false;
                         }
                    }
                    if($validation){
                         echo "<p>Login successfully!</p><br>";
                         echo "<p>Welcome administrator!</p><br>";
                         header('location:home.php?uname='.$userkey);
                    }
                    else{
                         echo '<p>Incorrect username, codename, email or password!</p><br>';
                    }                    
               }
               else{
                    echo "<p>User doesn't exist</p>";
               }
          ?>
     </div>
</body>
</html>