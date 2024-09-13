<?php
     require_once "config.php";

     $uname = $_GET['uname'];

     $query1 = "SELECT * FROM students";

     $result1 = mysqli_query($db, $query1);

     if(isset($_POST['save'])){

          $firstname = $_POST['firstname'];
          $secondname = $_POST['secondname'];
          $lastname = $_POST['lastname'];
          $age = $_POST['age'];
          $class = $_POST['class'];
          $stream = strtoupper($_POST['stream']);

          $date = date_default_timezone_set('Africa/Nairobi');
          if($date){
               $year = Date('Y');
                              
               if($class<5){
                    $period = 5-$class;
                    $year+=$period;

                    $expire = Date("$year-01-01");
               }
               else{
                    $period = $class-4;
                    $year+=$period;

                    $expire = Date("$year-06-01");
               }
          }

          $query = "UPDATE students SET firstname = '$firstname', secondname = '$secondname', lastname = '$lastname', 
                    age = '$age', form = '$class', stream = '$stream', tarehe = '$expire' WHERE userkey = '$uname'";

          $result = mysqli_query($db, $query);

          if($result){
               echo "Data updated successfully!";
               header('location: account.php?uname='.$uname);

          }
          else{
               echo "Error updating data!";
          }
     }

     if(isset($_POST['savephoto'])){
          $photo = $_FILES['photo']['tmp_name'];
          
          $dp = $_FILES['photo']['name'];

          $photoname = "media/images/prof_pics/" . $dp;

          move_uploaded_file($photo, $photoname);

          for($i=0; $i<mysqli_num_rows($result1); $i++){
               $row = mysqli_fetch_array($result1);

               if($row[$i]===$uname){
                    if($row['photo']===$photoname){
                         echo "Profile picture already exists";
                         header('location: account.php?uname='.$uname);
                    }
                    else{
                         $query2 = "UPDATE students SET photo = '$photoname' WHERE userkey = '$uname'";
                         $result2 = mysqli_query($db, $query2);

                         if($result2){
                              echo "Profile picture updated successfully";
                              header('location: account.php?uname='.$uname);
                         }
                         else{
                              echo "Error updating profile picture";
                         }
                    }
               }
          }
     }



     