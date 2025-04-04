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

               require_once "config.php";
               require "address.php";

               $uname = $_GET['uname'];
               $password = $_POST['password'];

               require "timer.php";

               $query = "SELECT * FROM admin";
               $query2 = "SELECT * FROM students";

               $result = mysqli_query($db, $query);
               $result2 = mysqli_query($db, $query2);

               $validation = false;

               if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);

                         if($uname === $row['userkey']){
                              $query3 = "UPDATE admin SET password = '$password' WHERE userkey = '$uname'";
                              $result3 = mysqli_query($db, $query3);

                              if($result3){
                                   $validation = true;
                              }
                              else{
                                   $validation = false;
                              }
                         }
                    }
               }
               if($result2){
                    for($i=0; $i<mysqli_num_rows($result2); $i++){
                         $row = mysqli_fetch_array($result2);

                         if($uname === $row['userkey']){
                              $query4 = "UPDATE students SET password = '$password' WHERE userkey = '$uname'";
                              $result4 = mysqli_query($db, $query4);

                              if($result4){
                                   $validation = true;
                              }
                              else{
                                   $validation = false;
                              }
                         }
                    }
               }
               else{
                    echo "Error";
               }
               if($validation){
                    echo "<p>Password changed successfully!</p><br>";
                    echo "<p>You can now <a href='home.php?uname=$uname'>continue</a></p>";
               }
               else{
                    echo "<p>Something went wrong!</p><br>";
                    echo "<p>You can now <a href='resetpass.php?uname=$uname'>Go back!</a></p>";
               }
          ?>
     </div>
</body>
</html>