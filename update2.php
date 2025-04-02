<?php
     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     $query1 = "SELECT * FROM admin";

     $result1 = mysqli_query($db, $query1);

     if(isset($_POST['save'])){
          $rank = $_POST['rank'];
          $codename = strtoupper($_POST['codename']);

          if($rank === "7" && $codename === "PRGM"){
               $otp = rand(100000000, 999999999);

               $fetch = "SELECT * FROM students";
               $feres = mysqli_query($db, $fetch);

               for($i=0; $i<mysqli_num_rows($feres); $i++){
                    $row = mysqli_fetch_array($feres);

                    if($uname === $row['userkey']){
                         $username = $row['username'];
                    }
               }

               $query = "SELECT * FROM seckeys";
               $result = mysqli_query($db, $query);

               $exist = false;

               if(mysqli_num_rows($result)>0){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);

                         if($uname === $row['id']){
                              $exist = true;
                         }
                    }
               }
               else{
                    $query3 = "INSERT INTO seckeys(username, OTP, id) VALUES('$username', '$otp', '$uname')";
                    $result3 = mysqli_query($db, $query3);

                    if($result3){
                         header("Location: checkdev.php?uname=$uname");
                    }
                    else{
                         echo "Error while inserting data!";
                    }
               }

               if($exist){
                    $query2 = "UPDATE seckeys SET OTP = '$otp' WHERE id = '$uname'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                         header("Location: checkdev.php?uname=$uname");
                    }
                    else{
                         echo "Failed to update table!";
                    }
               }
               else{
                    $query4 = "INSERT INTO seckeys(username, OTP, id) VALUES('$username', '$otp', '$uname')";
                    $result4 = mysqli_query($db, $query4);

                    if($result4){
                         header("Location: checkdev.php?uname=$uname");
                    }
                    else{
                         echo "Error while inserting data!";
                    }
               }
          }
          else{
               if($codename === "PRF" && $rank === "6"){
                    $query = "UPDATE admin SET rank = '$rank', codename = '$codename' WHERE userkey = '$uname'";
                    $result = mysqli_query($db, $query);

                    if($result){
                         echo "Data updated successfully!";
                         header('location: account-admin.php?uname='.$uname);

                    }
                    else{
                         echo "Error updating data!";
                    }
               }
               else{
                    header("Location:account-admin.php?uname=$uname");
               }
          }
     }
?>     