<?php

     $uname = $_GET['uname'];
     require "address.php";

     require_once "config.php";

     $query = "SELECT * FROM admin";
     $result = mysqli_query($db, $query);

     for($j=1; $j<6; $j++){
          if($_POST['sub'.$j] != ""){
               $subject = strtoupper($_POST['sub'.$j]);
          }
     }

     echo "Your subject is $subject <br>";

     if($result){
          for($i = 0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    $query2 = "UPDATE admin SET subject = '$subject' WHERE userkey = '$uname'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                         header('location:home.php?uname='.$uname);
                         echo $subject;
                    }
                    else{
                         echo "Error!";
                    }
               }
          }
     }