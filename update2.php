<?php
     require_once "config.php";

     $uname = $_GET['uname'];

     $query1 = "SELECT * FROM admin";

     $result1 = mysqli_query($db, $query1);

     if(isset($_POST['save'])){

          $firstname = $_POST['firstname'];
          $secondname = $_POST['secondname'];
          $lastname = $_POST['lastname'];
          $rank = $_POST['rank'];
          $codename = strtoupper($_POST['codename']);

          $query = "UPDATE admin SET firstname = '$firstname', secondname = '$secondname', lastname = '$lastname', 
                    rank = '$rank', codename = '$codename' WHERE userkey = '$uname'";

          $result = mysqli_query($db, $query);

          if($result){
               echo "Data updated successfully!";
               header('location: account-admin.php?uname='.$uname);

          }
          else{
               echo "Error updating data!";
          }
     }




     