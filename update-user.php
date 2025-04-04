<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <div class="register">
          <?php

               require_once "config.php";
               require "address.php";

               $uname = $_GET['uname'];

               require "timer.php";

               if(isset($_POST['send'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];

                    $ask = "SELECT * FROM students";
                    $ask2 = "SELECT * FROM admin";

                    $askresult = mysqli_query($db, $ask);
                    $askresult2 = mysqli_query($db, $ask2);

                    if($askresult){
                         for($i=0; $i<mysqli_num_rows($askresult); $i++){
                              $row = mysqli_fetch_array($askresult);
                              if($row['userkey'] === $uname){
                                   $query = "UPDATE students SET username = '$username', email = '$email' WHERE userkey = '$uname'";
                                   $result = mysqli_query($db, $query);
                              }
                         }
                    }
                    if($askresult2){
                         for($i=0; $i<mysqli_num_rows($askresult2); $i++){
                              $row = mysqli_fetch_array($askresult2);
                              if($row['userkey'] === $uname){
                                   $query = "UPDATE admin SET username = '$username', email = '$email' WHERE userkey = '$uname'";
                                   $result = mysqli_query($db, $query);
                              }
                         }               
                    }
                    if($result){
                         echo "<p>Username & Email updated successfully!</p><br><br>";
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
