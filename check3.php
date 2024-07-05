<?php

     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM students";

     $result = mysqli_query($db, $query);

     $validation = false;

     if($result){

          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $validation = true;
               }
          }
     }

     if($validation){
          include "assignment.php";
     }
     else{
          include "failed.php";
     }