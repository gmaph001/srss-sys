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
          $userkey = rand(100000000, 999999999);
          $position = 6;
          $codename = 'PRF';
          $prof = $_FILES['photo']['name'];
          $file = $_FILES['photo']['tmp_name'];

          if($file == ""){
               $profile = 'media/images/prof_pics/login.png';
          }
          else{
               $profile = 'media/images/prof_pics/' . $prof;
               $foldername = "media/images/prof_pics/" . $prof;
               move_uploaded_file($file, $foldername);
          }

          $date = date_default_timezone_set('Africa/Nairobi');
          if($date){
               $year = Date('Y');

               $year2 = $year+1;
               $expire2 = Date("$year2-01-01");
               
               if($class<5){
                    $period = 5-$class;
                    $year+=$period;

                    $expire = Date("$year-01-01");
               }
               else{
                    $period = 7-$class;
                    $year+=$period;

                    $expire = Date("$year-06-01");
               }
          }

          $query1 = "SELECT * FROM prefects";
          $reference1 = mysqli_query($db, $query1);
          $query2 = "SELECT * FROM admin";
          $reference2 = mysqli_query($db, $query2);
          $query3 = "SELECT * FROM students";
          $reference3 = mysqli_query($db, $query3);

          if($reference1 && $reference2 && $reference3){
               for($i=0; $i<mysqli_num_rows($reference1); $i++){
                    $row = mysqli_fetch_array($reference1);

                    if($userkey === $row['userkey']){
                         $userkey = rand(100000000, 999999999);
                    }
               }
               for($i=0; $i<mysqli_num_rows($reference2); $i++){
                    $row = mysqli_fetch_array($reference2);

                    if($userkey === $row['userkey']){
                         $userkey = rand(100000000, 999999999);
                    }
               }
               for($i=0; $i<mysqli_num_rows($reference3); $i++){
                    $row = mysqli_fetch_array($reference3);

                    if($userkey === $row['userkey']){
                         $userkey = rand(100000000, 999999999);
                    }
               }
          }

          $query = "INSERT INTO prefects (firstname, secondname, lastname, age, username, email, password, class, stream, rank, photo, userkey, expire) VALUES ('$firstname', '$secondname', '$lastname', '$age', '$username', '$email', '$password', '$class', '$stream', '$rank', '$profile', '$userkey', '$expire2')";

          $query2 = "INSERT INTO admin (firstname, secondname, lastname, username, email, password, rank, codename, photo, userkey) VALUES ('$firstname', '$secondname', '$lastname', '$username', '$email', '$password', '$position', '$codename', '$profile', '$userkey')";

          $query3 = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo, userkey, tarehe) VALUES ('$firstname', '$secondname', '$lastname', '$username', '$email', '$password', '$class', '$stream', '$age', '$profile', '$userkey', '$expire')";

          $result = mysqli_query($db, $query);
          $result2 = mysqli_query($db, $query2);
          $result3 = mysqli_query($db, $query3);

          if($result && $result2 && $result3){
               echo "Prefect successfully registered!";
               header('location:index.php');
          }
          else{
               echo "There was an error while registering the student!";
          }
     }