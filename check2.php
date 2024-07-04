<?php

     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);

     if($result){

          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['username'] === $uname){
                    $admin = $row['codename'];
                    if($admin == "PRF"){
                         include 'failed.php';
                    }
                    else{
                         include 'upload_assignment.html';
                    }
               }
          }
     }
     else{
          include 'failed.html';
     }

