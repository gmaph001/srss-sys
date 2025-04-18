<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload Notes</title>
     <link rel="stylesheet" type="text/css" href="login-page.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="title"></div><br><br>
          <div class="registration-success">
               <?php

                    require_once "config.php";
                    require "address.php";

                    $uname = $_GET['uname'];

                    require "timer.php";

                    if(isset($_POST['signup'])){

                         $teachername = $_POST['teachername'];
                         $subjectname = strtoupper($_POST['subjectname']);
                         $class = $_POST['class'];
                         $t = $_POST['topic'];
                         $topic = mysqli_real_escape_string($db, $t);
                         
                         $notes = $_FILES["notes"]["name"];
                         $file_type = $_FILES['notes']['type'];

                         echo  $file_type;

                         $file = $_FILES['notes']['tmp_name'];

                         $foldername = "media/documents/notes/" . $notes;
                         
                         move_uploaded_file($file, $foldername);

                         $topic = mysqli_real_escape_string($db, $topic);

                         $query = "INSERT INTO notes(subjectname, teachername, topic, notes, class) VALUES('$subjectname', '$teachername', '$topic', '$notes', '$class')";
                              
                         $result = mysqli_query($db, $query);

                         if($result){
                              echo "<p>Upload Successful</p>
                                   <p>You can now view your notes <a href='class.php?uname=$uname&&class=$class'>here</a></p>";

                         }else{

                              echo "<p>Upload Failed</p>";
                         }
                    }
               ?>
          </div>
     </div>
</body>
</html>