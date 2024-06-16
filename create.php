<?php
     require_once('config.php');
?>

               <?php
                    if(isset($_POST['signup'])){
                         $firstname = $_POST['firstname'];
                         $secondname = $_POST['secondname'];
                         $lastname = $_POST['lastname'];
                         $username = $_POST['username'];
                         $email = $_POST['email'];
                         $password = $_POST['secret'];
                         $form = $_POST['class'];
                         $stream = $_POST['stream'];
                         $age = $_POST['age'];
                         $dp = $_FILES['photo']['name'];
                         $file = $_FILES['photo']['tmp_name'];

                         $profile = 'media/images/prof_pics/' . $dp;
                         $foldername = "media/images/prof_pics/" . $dp;

                         move_uploaded_file($file, $foldername);

                         $sql = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo) VALUES (?,?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $form, $stream, $age, $profile]);
                         if($result){
                              header("location:home.php?uname=$username");
                         }
                         else{
                              echo "<p>There were errors while saving the data.</p>";
                              echo "<p><i>Go <a href='index.php'><b>back</b></a></i></p>";
                         }    
                    }
               ?>
         