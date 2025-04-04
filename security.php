<?php
     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     require "timer.php";

     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $password = $row['password'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $validation = 1;
               }
          }
     }
     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($row['userkey'] === $uname){
                    $password = $row['password'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $validation = 0;
               }
          }
     }
     else{
          echo "Error while connecting to database!";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Privacy & Security</title>
    <link rel="stylesheet" href="account.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
</head>
<body>
     <nav class="navigation">
          <div class="title">
               <div class="menubtn"><img src="media/images/icons/menu.png" class="menu" id="menu"></div>
               <span id="heading"><b>Najifunza</b></span>
          </div>
          <img src="media/images/srss-og.png" class="logo">
     </nav>
     <div class="body">
          <div class="sidebar">
               <ul type="none">
                    <?php

                         if($validation == 0){
                              echo "<li><a href='account-admin.php?uname=$uname'>My Profile</a></li>";
                         }
                         else{
                              echo "<li><a href='account.php?uname=$uname'>My Profile</a></li>";
                         }
                    ?>
                    <?php
                         echo 
                              "<li><a href='security.php?uname=$uname'>Privacy & Security</a></li>
                              <li><b><a href='home.php?uname=$uname'>Home</a></b></li>";
                    ?>
               </ul>
          </div>
          <div class="main">
               <div class="update">
                    <?php
                         echo "<form action='update_password.php?uname=$uname' method='POST' name='update' enctype='multipart/form-data'>";
                    ?>
                         <fieldset>
                              <legend><b>Security</b></legend>
                              <label><b>Old Password: </b></label><input type="password" name="oldpassword"><br>
                              <p id="alert1" class="alert"></p> <br>
                              <label><b>New Password: </b></label><input type="password" name="newpassword"><br>
                              <p id="alert2" class="alert"></p><br>
                              <label><b>Confirm Password: </b></label><input type="password" name="confirmpass"><br>
                              <p id="alert3" class="alert"></p><br>
                              <button onclick="save()" class="save" name="send">Save Password</button>
                         </fieldset>
                    </form><br><br>
                    <script>
                         function save(){

                              let alert1 = "*Please fill this field!*";
                              let alert2 = "*You have confirmed wrongly, please try again!*";

                              let p1 = document.update.newpassword.value;
                              let p2 = document.update.confirmpass.value;
                              if(document.update.oldpassword.value == ""){
                                   document.getElementById("alert1").innerHTML = alert1;
                                   event.preventDefault();
                              }
                              if(document.update.newpassword.value == ""){
                                   document.getElementById("alert2").innerHTML = alert1;
                                   event.preventDefault();
                              }
                              if(document.update.confirmpass.value == ""){
                                   document.getElementById("alert3").innerHTML = alert1;
                                   event.preventDefault();
                              }
                              if(p1!==p2){
                                   document.getElementById("alert3").innerHTML = alert2;
                                   event.preventDefault();
                              }
                         }

                         function save2(){
                              let alert1 = "*Please fill this field!*";

                              if(document.updateUser.username.value == ""){
                                   document.getElementById("alert4").innerHTML = alert1;
                                   event.preventDefault();
                              }
                              if(document.updateUser.email.value == ""){
                                   document.getElementById("alert5").innerHTML = alert1;
                                   event.preventDefault();
                              }
                         }
                    </script>
                    <script>
                         function badili(){
                              let alert1 = "*Please fill this field!*";
                              let alert2 = "*You have confirmed wrongly, please try again!*";

                              let p1 = document.update.username.value;
                              let p2 = document.update.email.value;
                              
                         }
                    </script>
                    <div class="delete" id="delete">
                         <h2>Delete Account</h2>
                         <p>
                              You can delete your account here. <br><br>
                              <span><i>Please, do not do this unintentionally!</i></span><br><br>
                              <button popovertarget="delete-popup" class="sureness" onclick="popoff('on')"><b>DELETE</b></button>
                         </p>
                    </div>
                    <div class="popup" popover id="delete-popup">
                         <div class="thibitisha">
                              <p>
                                   Are you sure, you want to delete your account?
                              </p><br><br>
                              <p class="choice">
                                   <span><?php echo "<a href='delete.php?uname=$uname' id='yes'>Yes</a></span>";?>
                                   <span><a onclick="popoff('off')" id="no">No</a> </span>
                              </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="footer">
          <p><b>&copy; Najifunza.org 2025</b></p>
     </div>
     <script src="account.js"></script>
     <script src="pop.js"></script>
</body>
</html>