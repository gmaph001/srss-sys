<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
error_reporting(E_ALL);


if(isset($_POST['signup'])){
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';// Specify main SMTP server
        $mail->SMTPAuth   = true;// Enable SMTP authentication
        $mail->Username   = 'gmaph001@gmail.com';// SMTP username
        $mail->Password   = 'lawbnavxoveqlehp';// SMTP password
        $mail->SMTPSecure = 'ssl';// Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 587;// TCP port to connect to
        //Recipients
        $mail->setFrom('gmaph001@gmail.com', 'SRSS SYS');
        $mail->addAddress($email, 'Joe User');//Add a recipient
        
        //Content
        $mail->isHTML(true);//Set email format to HTML
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