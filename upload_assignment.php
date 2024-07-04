<?php

     require_once "config.php";

     if(isset($_POST['upload'])){

          $teacher = $_POST['teacher'];
          $subject = $_POST['subject'];
          $class = $_POST['class'];
          $streams = $_POST['streamnumber'];
          $assigned = $_POST['assigned'];
          $due = $_POST['due'];
          $stream = [];
          $n = 0;
          
          for($i=1; $i<=$streams; $i++){
               $stream[$i] = $_POST['stream'.$i];
               $n++;
          }

          for($j=1; $j<=$n; $j++){
               echo $stream[$j];
          }

          $file = $_FILES['assignment']['tmp_name'];
          $filename = $_FILES['assignment']['name'];

          $foldername = "media/documents/assignments/" . $filename;
          $assignment = 'media/documents/assignments/' . $filename;

          move_uploaded_file($file, $foldername);

          for($k=1; $k<=$n; $k++){
               $query = "INSERT INTO assignments (subject, teacher, assignment, class, stream, assign_date, due_date) VALUES ('$subject', '$teacher', '$assignment', '$class', '$stream[$k]', '$assigned', '$due')";
               $result = mysqli_query($db, $query);

               if($result){
                    echo "Your assignment to $stream[$k] is uploaded successfully";
               }
               else{
                    echo "Upload for $stream[$k] failed!";
               }
          }
     }