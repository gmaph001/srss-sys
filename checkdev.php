<?php
    require "address.php";
    $uname = $_GET['uname'];
?>
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
            <?php echo "<form name='form' action='permgrant.php?uname=$uname' method='POST' enctype='multipart/form-data'>";?>
                <div class="input" id="secret">
                    <input type="password" name="pass" id="pword" placeholder="Password">
                    <img src="media/icons/hidden.png" class="icon pass">
                </div>
                <p id="result3" class="alert"></p><br>
                <button class="sendbtn" onclick="tuma()" name="login">Send</button>
            </form>
        </div>
    </div>
    <script src="form2.js"></script>
    <script src="timer.js"></script>
</body>
</html>