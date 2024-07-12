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
               <?php echo "<form action='reset.php?uname=$uname' method='POST' name='admin' enctype='multipart/form-data'>";?>
                    <fieldset>
                         <legend><b>New password</b></legend>
                         <p>
                              <i>Please insert your new password!</i>
                         </p>
                         <label><b>New Password: </b></label> <input type="password" name="password" id="pass1" placeholder="Please insert 9 characters"><br>
                         <p id="result1"></p><br>
                         <label><b>Confirm Password: </b></label> <input type="password" name="confirm" id="pass2" placeholder="Repeat your password"><br>
                         <p id="result2"></p><br>
                    </fieldset><br><br>
                    <button onclick="send()" name="signup" id="signUp">Send</button>
              </form>
          </div>
          <div class="photo2">
              
          </div>
      </div>
            <script>
               let result = "Please fill this field!";
               let result2 = "*The password must be more than 9 characters!*";
               let result3 = "*Please make sure that you have confirmed the password correctly!*";
               let pass1 = document.getElementById("pass1").value;
               let pass2 = document.getElementById("pass2").value;
   
               function send(){
                    
                    if(document.admin.password.value == ""){
                         document.getElementById("result1").innerHTML = result;
                         event.preventDefault();
                    }
                    if(document.admin.confirm.value==""){
                         document.getElementById("result2").innerHTML = result;
                         event.preventDefault();
                    }
                    if(document.admin.password.length<9){
                         document.getElementById("result1").innerHTML = result1;
                         event.preventDefault();
                    }
                    if(pass1 !== pass2){
                         document.getElementById("result2").innerHTML = result3;
                         event.preventDefault();
                    }
               }
               
           </script>
   </body>
   </html>