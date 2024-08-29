<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>QUERY FORM</title>
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
     <div class="body">
          <div class="form">
               <?php echo "<form name='form' action='check4.php' method='POST' enctype='multipart/form-data'>";?>
                    <div class="input">
                         <input type="text" name="uname" id="fname" placeholder="Username">
                         <img src="media/icons/profile.png" class="icon">
                    </div>
                    <p id="result1" class="alert"></p><br>
                    <div class="input">
                         <input type="email" name="email" id="email" placeholder="Email">
                         <img src="media/icons/email.png" class="icon">
                    </div>
                    <p id="result2" class="alert"></p><br>
                    <div class="input">
                         <input type="password" name="pass" id="pword" placeholder="Password">
                         <img src="media/icons/hidden.png" class="icon pass">
                    </div>
                    <p id="result3" class="alert"></p><br>
                    <button class="sendbtn" onclick="tuma()" name="login">Send</button>
               </form>
          </div>
     </div>
     <script src="form.js"></script>
</body>
</html>