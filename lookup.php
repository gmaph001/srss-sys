<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="register">
          <?php
               $username = $_POST['username'];
               $email = $_POST['email'];
               $password = $_POST['pword'];

               //Database connection

               $connect = new mysqli("localhost","root","","students_info");
               if ($connect->connect_error) {
                    die("Failed to connect with database : ". $connect->connect_error);
               }
               else{
                    $stmt = $connect->prepare("select * from students where email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                         $data = $result->fetch_assoc();
                         if($data['username'] === $username){
                              if($data['email'] === $email){
                                   if($data['password'] === $password){
                                        $userkey = $data['userkey'];
                                        header("location:home.php?uname=$userkey");
                                   }
                                   else{
                                        echo "<p>Invalid password.</p>";
                                   }
                              }
                              else{
                                   echo "<p>Invalid email.</p>";
                              }
                         }
                         else{
                              echo "<p>Invalid username.</p>";
                         }
                    }
                    else{
                         echo "<p>Error while confirming data!</p>";
                    }
               }
          ?>
     </div>
</body>
</html>     