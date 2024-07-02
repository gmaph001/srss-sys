<?php 

     require_once "config.php";

     if(isset($_POST['signup'])){
          $firstname = $_POST['firstname'];
          $secondname = $_POST['secondname'];
          $lastname = $_POST['lastname'];
          $age = $_POST['age'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['secret'];
          $class = $_POST['class'];
          $stream = $_POST['stream'];
          $rank = $_POST['rank'];
          $position = 6;
          $codename = 'PRF';
          $prof = $_FILES['photo']['name'];
          $file = $_FILES['photo']['tmp_name'];

          $photo = 'media/images/prof_pics/' . $prof;
          $foldername = "media/images/prof_pics" . $prof;

          move_uploaded_file($file, $foldername);

          $query = "INSERT INTO prefects (firstname, secondname, lastname, age, username, email, password, class, stream, rank, photo) VALUES ('$firstname', '$secondname', '$lastname', '$age', '$username', '$email', '$password', '$class', '$stream', '$rank', '$photo')";

          $query2 = "INSERT INTO admin (firstname, secondname, lastname, username, email, password, rank, codename, photo) VALUES ('$firstname', '$secondname', '$lastname', '$username', '$email', '$password', '$position', '$codename', '$photo')";

          $query3 = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo) VALUES ('$firstname', '$secondname', '$lastname', '$username', '$email', '$password', '$class', '$stream', '$age', '$photo')";

          $result = mysqli_query($db, $query);
          $result2 = mysqli_query($db, $query2);
          $result3 = mysqli_query($db, $query3);

          if($result || $result2 || $result3){
               echo "Prefect successfully registered!";
               header('location:prefects-signUp.html');
          }
          else{
               echo "There was an error while registering the student!";
          }
     }