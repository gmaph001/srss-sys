<?php

     require_once "config.php";

     // error_reporting(0);

     $uname = $_GET['uname'];


     if(isset($_POST['upload'])){

          $teacher = $_POST['teacher'];
          $subject = $_POST['subject'];
          $class = $_POST['class'];
          $streams = $_POST['streamnumber'];
          $assigned = $_POST['assigned'];
          $due = $_POST['due'];
          $n = 0;
          $valid = true;
          $errors = false;
          $strm;
          $stream[$n] = [];

          for($j=1; $j<11; $j++){
               $strm = $_POST["stream$j"];
               if($strm !== null){
                    $stream[$n] = $_POST["stream$j"];
                    $n++;
               }               
          }

          echo $n;

          $file = $_FILES['assignment']['tmp_name'];
          $filename = $_FILES['assignment']['name'];

          $foldername = "media/documents/assignments/" . $filename;
          $assignment = 'media/documents/assignments/' . $filename;

          move_uploaded_file($file, $foldername);

          for($k=0; $k<$n; $k++){
               $query = "INSERT INTO assignments (subject, teacher, assignment, class, stream, assign_date, due_date) VALUES ('$subject', '$teacher', '$assignment', '$class', '$stream[$k]', '$assigned', '$due')";
               $result = mysqli_query($db, $query);

               if($result){
                    echo "Your assignment to $stream[$k] is uploaded successfully";
                    $errors = true;
               }
               else{
                    $strm = $stream[$k];
                    $errors = false;
                    break;
               }
          } 

          if($errors){
               header("location:check3.php?uname=$uname");
          }
          else{
               echo "Upload of assignment $strm failed";
          }
     }