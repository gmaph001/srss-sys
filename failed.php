<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="register">
          <?php
               require_once "config.php";
               require "address.php";
               
               $uname = $_GET['uname'];
               echo "<p>You are not authorized for this!</p><br>";
               echo "<p>Go back!!</p><br>";
               echo "<a href = 'home.php?uname=$uname'>Enter</a><br>";
          ?>
     </div>
</body>
</html>