<?php

     require_once "config.php";

     error_reporting(0);

     $uname = $_GET['uname'];


     if(isset($_POST['upload'])){

          $teacher = $_POST['teacher'];
          $subject = $_POST['subject'];
          $class = $_POST['class'];
          $streams = $_POST['streamnumber'];
          $assigned = $_POST['assigned'];
          $due = $_POST['due'];
          $stream = [];
          $stream2 = [];
          $n = 0;
          $valid = true;
          $errors = false;
          
          try {
               for($i=1; $i<11; $i++){
                    if($_POST['stream'.$i] === ""){
                         $valid = false;
                    }
                    else{
                         $valid = true;
                         $n++;
                    }

                    if($valid){
                         $stream[$i] = $_POST['stream'.$i];
                    }
                    
               } 
          } catch (error $error) {
               $errors = true;
          }

          for($j=1; $j<$n; $j++){
               if($stream === ""){
                    $errors = true;
               }
               else{
                    $stream2[$j] = $stream[$j];
                    echo $stream[$j];
               }
               
          }

          $file = $_FILES['assignment']['tmp_name'];
          $filename = $_FILES['assignment']['name'];

          $foldername = "media/documents/assignments/" . $filename;
          $assignment = 'media/documents/assignments/' . $filename;

          move_uploaded_file($file, $foldername);

          for($k=1; $k<=$n; $k++){
               if($stream2[$k] != NULL){
                    $query = "INSERT INTO assignments (subject, teacher, assignment, class, stream, assign_date, due_date) VALUES ('$subject', '$teacher', '$assignment', '$class', '$stream2[$k]', '$assigned', '$due')";
                    $result = mysqli_query($db, $query);

                    if($result){
                         echo "Your assignment to $stream2[$k] is uploaded successfully";
                         $errors = true;
                    }
                    else{
                         echo "Upload for $stream2[$k] failed!";
                    }
               } 
          }

          // if($errors){
          //      header('location:home.php?uname='.$uname);
          // }
          // else{
          //      echo "Upload for $stream2[$k] failed!"; 
          // }
     }