<?php
     require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration | PHP</title>
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
     <center>
          <div class="register">
               <?php
                    if(isset($_POST['signup'])){
                         $firstname = $_POST['firstname'];
                         $secondname = $_POST['secondname'];
                         $lastname = $_POST['lastname'];
                         $username = $_POST['username'];
                         $email = $_POST['email'];
                         $password = $_POST['secret'];
                         $rank = $_POST['class'];
                         $codename = $_POST['stream'];
                         $photofile = $_FILES['photo']['tmp_name'];
                         $dp = $_FILES['photo']['name'];

                         $foldername = "media/images/prof_pics/" . $dp;
                         $photo = 'media/images/prof_pics/' . $dp;

                         move_uploaded_file($photofile, $foldername);

                         $sql = "INSERT INTO admin (firstname, secondname, lastname, username, email, password, rank, codename, photo) VALUES (?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $rank, $codename, $photo]);
                         if($result){
                              echo "<p>Successfully registered.</p><br>";
                              echo "<p><i>You can now <a href='council.html'><b>login</b></a></i></p>";
                         }
                         else{
                              echo "<p>There were errors while saving the data.</p>";
                         }    
                    }
               ?>
          </div>
     </center>
</body>
</html>