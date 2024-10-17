<?php

     $size = 0;
     $size2 = 0;
     $size3 = 0;
     $size4 = 0;

     $receivers[$size];
     $receiversdp[$size];
     $received[$size2];
     $sent[$size3];
     $received1[$size3];

     $tuma[$size4];
     $pokea[$size4];

     $uname = $_GET['uname'];

     require "config.php";

     $query = "SELECT * FROM students";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $sender = $row['username'];
                    $senderdp = $row['photo'];
               }
               else{
                    $receivers[$size] = $row['username'];
                    $receiversdp[$size] = $row['photo'];
                    $size++;
               }
          }
     }

     $query2 = "SELECT * FROM ujumbe";
     $result2 = mysqli_query($db, $query2);

     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($row['kutoka'] === $sender){
                    $sent[$size3] = $row['ujumbe'];
                    $size3++;
               }
               else if($row['kwenda'] === $sender){
                    $received[$size2] = $row['ujumbe'];
                    $size2++;
               }
          }
     }

     $lastrec = "none";

     for($i=0; $i<$size2; $i++){

          if($i = $size2-1){
               $lastrec = $received[$i];
          }
     }

     $lastrecp = "none";

     $query3 = "SELECT * FROM ujumbe";
     $result3 = mysqli_query($db, $query3);

     if($result3){
          for($i=0; $i<mysqli_num_rows($result3); $i++){
               $row = mysqli_fetch_array($result3);
     
               if($row['ujumbe'] === $lastrec){
                    $lastrecp = $row['kutoka'];
               }
          }
     }

     header("location: ujumbe.php?uname=$uname&&receiver=$lastrecp");
