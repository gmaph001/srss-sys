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

               $query = "SELECT * FROM students";

               $result = mysqli_query($db, $query);

               if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);
                         if($row['username'] === $uname){
                              $password = $row['password'];
                         }
                    }
                    if(isset($_POST['send'])){
                         $oldpassword = $_POST['oldpassword'];
                         $newpassword = $_POST['newpassword'];
                    
                         if($oldpassword !== $password){
                              echo "<p>Not authorized due to incorrect old password!</p>";
                         }
                         else{
                              $query2 = "UPDATE students SET password = '$newpassword' WHERE username = '$uname'";
                         
                              $result2 = mysqli_query($db, $query2);
                         
                              if($result2){
                                   echo "<p>Password updated successfully!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Continue</b></a></p>";
                              }
                              else{
                                   echo "<p>Error while updating password!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Go back</b></a></p>";

                              }
                         }
                    }
               }

          ?>
     </div>
</body>
</html>
