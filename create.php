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
                         $userkey = rand(100000000, 999999999);
                         $form = $_POST['class'];
                         $stream = $_POST['stream'];
                         $age = $_POST['age'];
                         $dp = $_FILES['photo']['name'];
                         $file = $_FILES['photo']['tmp_name'];

                         $query = "SELECT * FROM students";

                         $reference = mysqli_query($db, $query);

                         if($reference){
                              for($i=0; $i<mysqli_num_rows($reference); $i++){
                                   $row = mysqli_fetch_array($reference);

                                   if($userkey === $row['userkey']){
                                        $userkey = rand(100000000, 999999999);
                                   }
                              }
                         }

                         $profile = 'media/images/prof_pics/' . $dp;
                         $foldername = "media/images/prof_pics/" . $dp;

                         move_uploaded_file($file, $foldername);

                         $sql = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo, userkey) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $form, $stream, $age, $profile, $userkey]);
                         if($result){
                              header("location:home.php?uname=$userkey");
                         }
                         else{
                              echo "<p>There were errors while saving the data.</p>";
                              echo "<p><i>Go <a href='index.php'><b>back</b></a></i></p>";
                         }    
                    }
               ?>
         