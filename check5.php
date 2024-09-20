<?php

     $uname = $_GET['uname'];

     require("config.php");

     $query = "SELECT * FROM admin";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    if($row['rank'] == 7){
                         header("location:users.php?uname=$uname");
                    }
                    else{
                         header("location:failed.php?uname=$uname");
                    }
               }
          }
     }
     else{
          header("location:failed.php?uname=$uname");
     }