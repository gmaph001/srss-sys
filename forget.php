<?php
     require_once "config.php";

     $number = rand(100000, 999999);
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

     echo $number;
     $from = "gmaph001@gmail.com";
     $email = $_POST['email'];
     $subject = 'Your OTP is: ';

     $query = "SELECT * FROM admin";
     $query2 = "SELECT * FROM students";

     $result1 = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result1){
          for($i=0; $i<mysqli_num_rows($result1); $i++){
               $row = mysqli_fetch_array($result1);

               if($email === $row['email']){
                    $query3 = "UPDATE admin SET OTP = '$number' WHERE email = '$email'";
                    $result3 = mysqli_query($db, $query3);

                    if($result3){
                         $firstname = $row['firstname'];
                         $uname = $row['userkey'];
                         require 'PHPMailer/src/Exception.php';
                         require 'PHPMailer/src/PHPMailer.php';
                         require 'PHPMailer/src/SMTP.php';

                         //Create an instance; passing `true` enables exceptions
                         $mail = new PHPMailer(true);

                         try {
                         //Server settings
                         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                         $mail->isSMTP();                                            //Send using SMTP
                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

                         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                         $mail->Username   = 'gmaph001@gmail.com';                     //SMTP username
                         $mail->Password   = 'buybcbyznywjakcc';                               //SMTP password

                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS - Enable implicit TLS encryption
                         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                         //Recipients
                         $mail->setFrom('gmaph001@gmail.com', 'SRSS SYS');
                         $mail->addAddress($email, 'Joe User');     //Add a recipient

                         //Content
                         $mail->isHTML(true);                                  //Set email format to HTML
                         $mail->Subject = 'Email Authentication.';
                         $mail->Body    = '  
                                             
                                             <h1>Dear '.$firstname.', your code is: </h1>
                                             <h2>'.$number.'</h2>
                         ';

                         if ($mail->send()) {
                              header("location: mail.php?uname=$uname");
                         }
                         else{
                              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                         }
                         
                         } 
                         catch (Exception $e) {
                              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                         }
                    }
                    else{
                         echo "USER NOT FOUND!";
                    }
               }
          }
     }
     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($email === $row['email']){
                    $query4 = "UPDATE students SET OTP = '$number' WHERE email = '$email'";
                    $result4 = mysqli_query($db, $query4);

                    if($result4){
                         $firstname = $row['firstname'];
                         $uname = $row['userkey'];
                         require 'PHPMailer/src/PHPMailer.php';
                         require 'PHPMailer/src/SMTP.php';

                         //Create an instance; passing `true` enables exceptions
                         $mail = new PHPMailer(true);

                         try {
                         //Server settings
                         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                         $mail->isSMTP();                                            //Send using SMTP
                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

                         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                         $mail->Username   = 'gmaph001@gmail.com';                     //SMTP username
                         $mail->Password   = 'buybcbyznywjakcc';                               //SMTP password

                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS - Enable implicit TLS encryption
                         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                         //Recipients
                         $mail->setFrom('gmaph001@gmail.com', 'SRSS SYS');
                         $mail->addAddress($email, 'Joe User');     //Add a recipient

                         //Content
                         $mail->isHTML(true);                                  //Set email format to HTML
                         $mail->Subject = 'Email Authentication.';
                         $mail->Body    = '  
                                             
                                             <h1>Dear '.$firstname.', your code is: </h1>
                                             <h2>'.$number.'</h2>
                         ';

                         if ($mail->send()) {
                              header("location: mail.php?uname=$uname");
                         }
                         else{
                              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                         }
                         
                         } 
                         catch (Exception $e) {
                              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                         }
                    }
                    else{
                         echo "USER NOT FOUND!";
                    }
               }
          }
     }
     else{
          echo "ERROR IN DATABASE!";
     }

     