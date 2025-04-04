<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
     <title>Upload-Photo</title>
</head>
<body>
     <?php
          require_once "config.php";
          require "address.php";

          $uname = $_GET['uname'];

          require "timer.php";

          $query1 = "SELECT * FROM students";
          $query2 = "SELECT * FROM admin";

          $result1 = mysqli_query($db, $query1);
          $result2 = mysqli_query($db, $query2);

          if(isset($_POST['savephoto'])){
               $photo = $_FILES['photo']['tmp_name'];
               
               $dp = $_FILES['photo']['name'];

               $photoname = "media/images/prof_pics/" . $dp;

               move_uploaded_file($photo, $photoname);

               if($result2){
                    for($i=0; $i<mysqli_num_rows($result2); $i++){
                         $row = mysqli_fetch_array($result2);

                         if($row['userkey'] === $uname){
                              if($row['photo']===$photoname){
                                   echo "Profile picture already exists";
                                   header('location: account.php?uname='.$uname);
                              }
                              else{
                                   $query3 = "UPDATE admin SET photo = '$photoname' WHERE userkey = '$uname'";
                                   $result3 = mysqli_query($db, $query3);

                                   if($result3){
                                        echo "Profile picture updated successfully";
                                        header('location: account-admin.php?uname='.$uname);
                                   }
                                   else{
                                        echo "Error updating profile picture";
                                   }
                              }
                         }
                    }
               }

               if($result1){
                    for($i=0; $i<mysqli_num_rows($result1); $i++){
                         $row = mysqli_fetch_array($result1);

                         if($row['userkey'] === $uname){
                              if($row['photo']===$photoname){
                                   echo "Profile picture already exists";
                                   header('location: account-admin.php?uname='.$uname);
                              }
                              else{
                                   $query4 = "UPDATE students SET photo = '$photoname' WHERE userkey = '$uname'";
                                   $result4 = mysqli_query($db, $query4);

                                   if($result4){
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
          }
     ?>
</body>
</html>