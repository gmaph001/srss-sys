<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <title>Upload-Photo</title>
</head>
<body>
     <?php
          require_once "config.php";

          $uname = $_GET['uname'];

          $query1 = "SELECT * FROM students";
          $query2 = "SELECT * FROM admin";

          $result1 = mysqli_query($db, $query1);
          $result2 = mysqli_query($db, $query2);

          if(isset($_POST['savephoto'])){
               $photo = $_FILES['photo']['tmp_name'];
               
               $dp = $_FILES['photo']['name'];

               $photoname = "media/images/prof_pics/" . $dp;

               move_uploaded_file($photo, $photoname);

               for($i=0; $i<mysqli_num_rows($result1); $i++){
                    $row = mysqli_fetch_array($result1);

                    if($row['username'] === $uname){
                         if($row['photo']===$photoname){
                              echo "Profile picture already exists";
                              header('location: account.php?uname='.$uname);
                         }
                         else{
                              $query3 = "UPDATE students SET photo = '$photoname' WHERE username = '$uname'";
                              $result3 = mysqli_query($db, $query3);

                              if($result3){
                                   echo "Profile picture updated successfully";
                                   header('location: account.php?uname='.$uname);
                              }
                              else{
                                   echo "Error updating profile picture";
                              }
                         }
                    }
               }
          }
          else{
               $photo = $_FILES['photo']['tmp_name'];
               
               $dp = $_FILES['photo']['name'];

               $photoname = "media/images/prof_pics/" . $dp;

               move_uploaded_file($photo, $photoname);

               for($i=0; $i<mysqli_num_rows($result2); $i++){
                    $row = mysqli_fetch_array($result2);

                    if($row['username'] === $uname){
                         if($row['photo']===$photoname){
                              echo "Profile picture already exists";
                              header('location: account.php?uname='.$uname);
                         }
                         else{
                              $query4 = "UPDATE students SET photo = '$photoname' WHERE username = '$uname'";
                              $result4 = mysqli_query($db, $query4);

                              if($result2){
                                   echo "Profile picture updated successfully";
                                   header('location: account.php?uname='.$uname);
                              }
                              else{
                                   echo "Error updating profile picture";
                              }
                         }
                    }
               }
          }
     ?>
</body>
</html>