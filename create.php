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

                         if($file == ""){
                              $profile = 'media/images/prof_pics/login.png';
                              echo $profile;
                              echo "<br>";
                         }
                         else{
                              $profile = 'media/images/prof_pics/' . $dp;
                              $foldername = "media/images/prof_pics/" . $dp;
                              move_uploaded_file($file, $foldername);
                         }
                         
                         $date = date_default_timezone_set('Africa/Nairobi');
                         if($date){
                              $year = Date('Y');
                              
                              if($form<5){
                                   $period = 5-$form;
                                   $year+=$period;

                                   $expire = Date("$year-01-01");
                              }
                              else{
                                   $period = 7-$form;
                                   $year+=$period;

                                   $expire = Date("$year-06-01");
                              }
                         }

                         $query = "SELECT * FROM students";
                         $query2 = "SELECT * FROM admin";

                         $reference = mysqli_query($db, $query);
                         $reference2 = mysqli_query($db, $query2);

                         if($reference){
                              for($i=0; $i<mysqli_num_rows($reference); $i++){
                                   $row = mysqli_fetch_array($reference);

                                   if($userkey === $row['userkey']){
                                        $userkey = rand(100000000, 999999999);
                                   }
                              }
                         }

                         if($reference2){
                              for($i=0; $i<mysqli_num_rows($reference2); $i++){
                                   $row = mysqli_fetch_array($reference2);

                                   if($userkey === $row['userkey']){
                                        $userkey = rand(100000000, 999999999);
                                   }
                              }
                         }

                         $sql = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo, userkey, tarehe) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $form, $stream, $age, $profile, $userkey, $expire]);
                         if($result){
                              header("location:home.php?uname=$userkey");
                              echo $tarehe;
                              echo $profile;
                         }
                         else{
                              echo "<p>There were errors while saving the data.</p>";
                              echo "<p><i>Go <a href='index.php'><b>back</b></a></i></p>";
                         }    
                    }
               ?>
         