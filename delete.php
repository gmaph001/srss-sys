<?php

     $uname = $_GET['uname'];

     require_once "config.php";

     $query = "SELECT * FROM admin";
     $query2 = "SELECT * FROM students";
     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    $query3 = "DELETE FROM admin WHERE userkey = '$uname'";
                    $result3 = mysqli_query($db, $query3);

                    if($result3){
                         header('location:index.php');
                    }
                    else{
                         echo "Error!";
                    }
               }
          }
     }
     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($uname === $row['userkey']){
                    $query4 = "DELETE FROM students WHERE userkey = '$uname'";
                    $result4 = mysqli_query($db, $query4);

                    if($result4){
                         header('location:index.php');
                    }
                    else{
                         echo "Error!";
                    }
               }
          }
     }