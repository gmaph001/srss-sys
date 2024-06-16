
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
                              if($data['password'] === $password){
                                   header("location:home.php?uname=$username");
                              }
                              else{
                                   echo "<p>Invalid username, email or password.</p>";
                              }
                         }
                    }
               }
          ?>
     