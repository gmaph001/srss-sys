<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload Notes</title>
     <link rel="stylesheet" type="text/css" href="login-page.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="title"></div><br><br>
          <div class="registration-success"></div>
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
                                   $errors = true;
                              }
                              else{
                                   $strm = $stream[$k];
                                   $errors = false;
                                   break;
                              }
                         } 

                         if($errors){
                              echo "<p>You can now view the uploaded assignment <a href='check3.php?uname=$uname'>here</a></p>";
                         }
                         else{
                              echo "<p>Upload of assignment $strm failed</p>";
                         }
                    }
               ?>
          </div>
     </div>
</body>
</html>