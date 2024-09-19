<?php
     $uname = $_GET['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | Admin</title>
     <link rel="stylesheet" type="text/css" href="upload.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body> 
     <div class="main">
          <div class="form">
               <div class="title"></div><br><br>
               <?php echo "<form action='mailconfirm.php?uname=$uname' method='POST' name='admin' enctype='multipart/form-data'>";?>
                    <fieldset>
                         <legend><b>Administrator</b></legend>
                         <p>
                              <i>Please insert the code sent to your email address!</i>
                         </p>
                         <label><b>OTP: </b></label> <input type="number" name="otp" id="otpnumb"><br>
                         <p id="result3"></p><br>
                    </fieldset><br><br>
                    <button onclick="send()" name="signup" id="signUp">Send</button>
              </form>
          </div>
          <div class="photo2">
              
          </div>
      </div>
            <script>
               let result = "Please fill this field!";
               let otp = document.getElementById("otpnumb").value;
               let result2 = "*The otp must be more than 6 numbers!*";
   
               function send(){
                    
                    if(document.admin.otp.value == ""){
                         document.getElementById("result3").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(document.admin.otp.value.length<6){
                              document.getElementById("result3").innerHTML = result2;
                              event.preventDefault();
                         }
                    }
               }
           </script>
   </body>
   </html>