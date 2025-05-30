<?php
     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     require "timer.php";

     $query = "SELECT * FROM admin";
     $query2 = "SELECT * FROM students";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $username = $row['username'];
                    $email = $row['email'];
                    $rank = $row['rank'];
                    $codename = $row['codename'];
                    $photo = $row['photo'];
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
    <title>NAJIFUNZA | My Account</title>
    <link rel="stylesheet" href="account.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
                         echo 
                              "<li><a href='account-admin.php?uname=$uname'>My Profile</a></li>
                              <li><a href='security.php?uname=$uname'>Privacy & Security</a></li>
                              <li><b><a href='home.php?uname=$uname'>Home</a></b></li>";
                              if($rank == 1){
                                   echo "<li><b><a href='suggestions.php?uname=$uname'>Suggestions</a></b></li>";
                              }
                    ?>
               </ul>
          </div>
          <div class="main">
                    <?php
                         echo "<form action='update-user.php?uname=$uname' method='POST' class='update' name='updateUser' enctype='multipart/form-data'>";
                    ?>
                         <fieldset>
                              <legend><b>Username & Email</b></legend>
                              <label><b>Username: </b></label>&nbsp;&nbsp;<?php echo $username;?> &nbsp;&nbsp;<input type="text" name="username" required><br><br>
                              <label><b>Email: </b></label>&nbsp;&nbsp;<?php echo $email;?> &nbsp;&nbsp;<input type="email" name="email" required><br><br>
                              <button onclick="save2()" class="save" name="send">Save</button>
                         </fieldset>
                    </form><br><br>
               <?php
                    echo
                         "<form action='update2.php?uname=$uname' method='POST' name='upload' class='update' enctype='multipart/form-data'>
                         <fieldset>
                         <legend><b>My Profile</b></legend> 
                                   <label><b>Rank: </b></label> <input type='number' name='rank' value='$rank' placeholder='change' required><br>
                                   <p id='alert4' class='alert'></p><br>
                                   <label><b>Codename: </b></label> <input type='text' name='codename' value='$codename' placeholder='change' required><br>
                                   <p id='alert5' class='alert'></p><br>";
               ?>
                         <button onclick="sasisha()" class="save" name="save">Save</button> 
                    </fieldset>
               </form>
          </div>
          <div class="profile">
               <?php
                    echo
                         "<form action='update_photo.php?uname=$uname' method='POST' name='update' class='update-photo' enctype='multipart/form-data'>
                              <img src='$photo' class='photo' width='200px' height='250px'><br><br>
                              <label><b>Upload your photo: </b></label><input type='file' name='photo' id='pic' value='$photo' onchange='photosize()'><br>
                              <p id='alert6' class='alert'></p><br>
                              <button onclick='photosubmit()' class='save' name='savephoto'>Save</button>                                          
                         </form>";
                         
               ?>
          </div>
     </div>
     <div class="otherprofile">
               <?php

                    if($result2){
                         for($i=0; $i<mysqli_num_rows($result2); $i++){
                              $row = mysqli_fetch_array($result2);
                              if($uname === $row['userkey']){
                                   echo 
                                        "
                                           <a href='account.php?uname=$uname' class='save'>Edit your Student's profile.</a>  
                                        ";
                              }
                         }
                    }

                    if($rank == 7){
                         echo 
                              "
                                 <a href='seckeys.php?uname=$uname' class='save'>Security Keys.</a>  
                              ";
                    }
               ?>

          </div>
          <script>
               let result = "*Please fill this field!*";
               let result2 = "*File too large to be submitted!*";
               let rankres = "*Please insert correct rank!*";
               let stream = ['HM', 'DHM', 'AM', 'DM', 'TEA', 'PRF', 'PRGM'];
               let valid = true;
               let strmresult = "*Please insert the correct codename!*";

               function sasisha(){
                    if(document.upload.rank.value == 0){
                         document.getElementById("alert4").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(document.upload.rank.value<0 || document.upload.rank.value>7){
                              document.getElementById("alert4").innerHTML = rankres;
                              event.preventDefault();
                         }
                    }

                    if(document.upload.codename.value == ""){
                         document.getElementById("alert5").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         for(let i=0; i<stream.length; i++){
                              if(document.upload.codename.value == stream[i]){
                                   valid = true;
                                   break;
                              }
                              else{
                                   valid = false;
                              }
                         }

                         if(!valid){
                              document.getElementById("alert5").innerHTML = strmresult;
                              event.preventDefault();
                         }
                    }
               }

               function photosize(){
                    let photo = document.getElementById("pic");
                    let returnvalue = true;
                    if(document.update.photo.value === "none"){
                         return returnvalue;
                    }
                    else{
                         let photoresponse = "*Please, your file should be less than 2MB!*";
                         let size = Math.round((photo.files[0].size)/1024/1024);
                         if(size>2){
                              document.getElementById("alert6").innerHTML = photoresponse;
                              event.preventDefault();
                              returnvalue = false;
                         }
                         else{
                              document.getElementById("alert6").innerHTML = "";
                              returnvalue = true;
                         }
                         return returnvalue;
                    }
               }

               function photosubmit(){
                    if(document.update.photo.value == ""){
                         document.getElementById("alert6").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(!photosize()){
                              document.getElementById("alert6").innerHTML = result2;
                         }
                    }
               }
          </script>
     <div class="footer">
          <p><b>&copy; Najifunza.org 2025</b></p>
     </div>
     <script src="account.js"></script>
</body>
</html>