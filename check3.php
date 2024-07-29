<?php

     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     $validation1 = false;
     $validation2 = false;

     if($result){

          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $validation1 = true;
               }
          }
     }
     else{

          if($result2){
               for($i=0; $i<mysqli_num_rows($result2); $i++){
                    $row = mysqli_fetch_array($result2);
     
                    if($row['userkey'] === $uname){
                         $validation2 = true;
                    }
               }
          }
     }

     if($validation1){
          include "assignment.php";
     }
     else{
          include "assignment2.php";
     }
     // else{
     //      include "failed.php";
     // }