<?php
    $uname = $_GET['uname'];
    require "address.php";
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
            <?php echo "<form name='form' action='suggestions-box.php?uname=$uname' method='POST' enctype='multipart/form-data'>";?>
                <p class="qn">Do you want your name to be seen? <input type="checkbox" name="seen" value="weka" class="choice"/></p><br>
                <textarea name="suggestions" class="suggestions" placeholder="You can suggest anything here..."></textarea>
                <p id="result" class="alert"></p><br>
                <button class="sendbtn" onclick="send()" name="tuma">Post</button>
            </form>
        </div>
    </div>
    <script>
        function send(){
            if(document.form.suggestions.value === ""){
                document.getElementById("result").innerHTML = "*Please insert your suggestions here!*";
                event.preventDefault();
            }
        }
    </script>
</body>
</html>