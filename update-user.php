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

               $uname = $_GET['uname'];

               if(isset($_POST['send'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
               
                    $query = "UPDATE students SET username = '$username', email = '$email' WHERE username = '$uname'";
                    
                    $result = mysqli_query($db, $query);
                    
                    if($result){
                         echo "<p>Username & Email updated successfully!</p><br><br>";
                         $uname = $username;
                         echo "<p>You can &nbsp; &nbsp; &nbsp; <a href='security.php?uname=$uname'><b>Continue</b></a></p>";
                    }
                    else{
                         echo "<p>Error while updating username & email!</p><br><br>";
                         echo "<p>You can <a href='security.php?uname=$uname'><b>Go back</b></a></p>";

                    }
               }
          ?>
     </div>
</body>
</html>
