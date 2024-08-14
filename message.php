<?php

     $uname = $_GET['uname'];

     require_once "config.php";

     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if("HM" === $row['codename']){
                    $headmaster = $row['username'];
               }
          }
     }

     if(isset($_POST['send'])){
          $message = $_POST['ujumbe'];

          if($result){
               for($i=0; $i<mysqli_num_rows($result); $i++){
                    $row = mysqli_fetch_array($result);
                    
                    if($uname === $row['userkey']){
                         $username = $row['username'];
                         date_default_timezone_set('Africa/Nairobi');
                         $time = date("h:i a");
                         $date = date("Ymd");
                         $query3 = "INSERT INTO chat(kutoka, ujumbe, kwenda, muda, tarehe) VALUES('$username', '$message', '$headmaster', '$time', '$date')";
                         $result3 = mysqli_query($db, $query3);

                         if($result3){
                              echo "Message sent";
                              echo "<br>";
                              echo $time;
                              echo "<br>";
                              echo $date;

                              header("location: chat.php?uname=".$uname);
                         }
                         else{
                              echo "Error sending message";
                         }
                    }
               }
          }
          else{
               if($result2){
                    for($i=0; $i<mysqli_num_rows($result2); $i++){
                         $row = mysqli_fetch_array($result2);
          
                         if("HM" === $row['codename']){
                              $username = $row['username'];
                              date_default_timezone_set('Africa/Nairobi');
                              $time = date("h:i a");
                              $date = date("Ymd");
                              $query3 = "INSERT INTO chat(kutoka, ujumbe, kwenda, muda, tarehe) VALUES('$username', '$message', '$headmaster', '$time', '$date')";
                              $result3 = mysqli_query($db, $query3);

                              if($result3){
                                   echo "Message sent";
                                   echo "<br>";
                                   echo $time;
                                   echo "<br>";
                                   echo $date;

                                   header("location: chat.php?uname=".$uname);
                              }
                              else{
                                   echo "Error sending message";
                              }
                         }
                    }
               }
          }
     }
