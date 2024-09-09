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
                         $default = 21000000000;
                         if($date){
                              $year = Date('Y');
                              $week = Date('W');
                              $day = Date('d');
                              $hour = Date('h');
                              $min = Date('m');
                              $sec = Date('s');

                              $tarehe = ((((($year*$week*7)+$day)*24)+$hour)*60)+$min;
                              echo $tarehe;
                              echo "<br>";
                              echo $day;
                              echo "<br>";
                              echo $week;
                              echo "<br>";
                              echo $year;
                              echo "<br>";
                         }
                         if($tarehe>$default){
                              $tarehe-=$default;
                         }

                         echo $tarehe;
                         echo "<br>";

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

                         $sql = "INSERT INTO students (firstname, secondname, lastname, username, email, password, form, stream, age, photo, userkey, tarehe) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                         $stmtinsert = $db->prepare($sql);
                         $result = $stmtinsert->execute([$firstname, $secondname, $lastname, $username, $email, $password, $form, $stream, $age, $profile, $userkey, $tarehe]);
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
         