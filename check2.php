<?php

     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);

     if($result){

          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $admin = $row['codename'];
                    if($admin == "PRF"){
                         header("location:failed.php?uname=$uname");
                    }
                    else{
                         header("location:upload_assignment.php?uname=$uname");
                    }
               }
          }
     }
     else{
          include 'failed.html';
     }

