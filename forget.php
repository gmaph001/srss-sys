<?php
     require_once "config.php";

     $number = rand(100000, 999999);

     echo $number;
     $from = "gmaph001@gmail.com";
     $email = $_POST['email'];
     $subject = 'Your OTP is: ';

     $query = "SELECT * FROM admin";
     $query2 = "SELECT * FROM students";

     $result1 = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result1){
          for($i=0; $i<mysqli_num_rows($result1); $i++){
               $row = mysqli_fetch_array($result1);

               if($email === $row['email']){
                    $query3 = "UPDATE admin SET OTP = '$number' WHERE email = '$email'";
                    $result3 = mysqli_query($db, $query3);

                    if($result3){
                         $mailto = mb_send_mail($from, $email, $subject, $number);

                         if($mailto){
                              echo "Email successfully sent!";
                              // header('location: mail.php');
                         }
                         else{
                              echo "Email not sent, please try again!";
                         }
                    }
                    else{
                         echo "failed to send OTP!";
                    }
               }
          }
     }
     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($email === $row['email']){
                    $query4 = "UPDATE students SET OTP = '$number' WHERE email = '$email'";
                    $result4 = mysqli_query($db, $query4);

                    if($result4){
                         $mailto = mb_send_mail($from, $email, $subject, $number);

                         if($mailto){
                              echo "Email successfully sent!";
                              // header('location: mail.php');
                         }
                         else{
                              echo "Email not sent, please try again!";
                         }
                    }
                    else{
                         echo "failed to send OTP!";
                    }
               }
          }
     }
     else{
          echo "USER NOT FOUND!";
     }