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
                    $username = $row['username'];
                    $email = $row['email'];
                    $class = $row['form'];
                    $stream = $row['stream'];
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
    <title>SRSS | My Account</title>
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
                         echo 
                              "<li><a href='account.php?uname=$uname'>My Profile</a></li>
                              <li><a href='security.php?uname=$uname'>Privacy & Security</a></li>
                              <li><b><a href='home.php?uname=$uname'>Home</a></b></li>
                              <li><b><a href='suggest.php?uname=$uname'>Suggestions</a></b></li>";
                    ?>
               </ul>
          </div>
          <div class="main">
               <?php
                         echo "<form action='update-user.php?uname=$uname' method='POST' class='update' name='updateUser' enctype='multipart/form-data'>";
                    ?>
                         <fieldset>
                              <legend><b>Username & Email</b></legend>
                              <label><b>Username: </b></label>&nbsp;&nbsp;<?php echo $username;?> &nbsp;&nbsp;<input type="text" name="username" required><br>
                              <p id="alert4" class="alert"></p> <br>
                              <label><b>Email: </b></label>&nbsp;&nbsp;<?php echo $email;?> &nbsp;&nbsp;<input type="email" name="email" required><br>
                              <p id="alert5" class="alert"></p><br>
                              <button onclick="save2()" class="save" name="send">Save</button>
                         </fieldset>
                    </form><br><br>
               <?php
                    echo
                         "<form action='update.php?uname=$uname' method='POST' name='upload' class='update' enctype='multipart/form-data'>
                         <fieldset>
                         <legend><b>My Profile</b></legend>
                                   <label><b>Class: </b></label> <input type='number' name='class' value='$class' placeholder='change' required><br>
                                   <p id='alert5' class='alert'></p><br>
                                   <label><b>Stream: </b></label> <input type='text' name='stream' value='$stream' placeholder='change' required><br>
                                   <p id='alert6' class='alert'></p><br>";
               ?>
                         <button onclick="sasisha()" class="save" name="save">Save</button> 
                    </fieldset>
               </form>
          </div>
          <div class="profile">
               <?php
                    echo
                         "<form action='update_photo.php?uname=$uname' method='POST' name='update' class='update' enctype='multipart/form-data'>
                              <img src='$photo' class='photo' width='200px' height='250px'><br><br>
                              <label><b>Upload your photo: </b></label><input type='file' id='pic' name='photo' value='none'><br>
                              <p id='alert7' class='alert'></p><br>
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
                                           <a href='account-admin.php?uname=$uname' class='save'>Edit your Admin profile.</a>  
                                        ";
                              }
                         }
                    }


               ?>
          </div>
     <div class="footer">
          <div class="p-icons">
               <!-- <?php echo "<a href='via.php?uname=$uname' class='icons-link'><img src='media/icons/live-chat.png' class='icons'></a>";?> -->
          </div>
          <p>&copy; Najifunza.org 2025</p>
     </div>
     <script src="account.js"></script>
     <script>
               let result = "*Please fill this field!*";
               let result2 = "*File too large to be submitted!*";
               let classres = "*Please insert correct class!*";
               let stream = ['T', 'K', 'U', 'E', 'A', 'B', 'PCM', 'PMC', 'PGM', 'PCB', 'CBG', 'ECA', 'EGM', 'HKL', 'HGL', 'HGE'];
               let valid = true;
               let strmresult = "*Please insert the correct codename!*";
               let ageresult = "*Age not acceptable!*";

               function sasisha(){
                    if(document.upload.class.value == 0){
                         document.getElementById("alert5").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(document.upload.class.value<0 || document.upload.class.value>6){
                              document.getElementById("alert5").innerHTML = classres;
                              event.preventDefault();
                         }
                    }

                    if(document.upload.firstname.value == ""){
                         document.getElementById("alert").innerHTML = result;
                         event.preventDefault();
                    }

                    if(document.upload.secondname.value == ""){
                         document.getElementById("alert2").innerHTML = result;
                         event.preventDefault();
                    }

                    if(document.upload.lastname.value == ""){
                         document.getElementById("alert3").innerHTML = result;
                         event.preventDefault();
                    }

                    if(document.upload.stream.value == 0){
                         document.getElementById("alert6").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         for(let i=0; i<stream.length; i++){
                              if(document.upload.stream.value == stream[i]){
                                   valid = true;
                                   break;
                              }
                              else{
                                   valid = false;
                              }
                         }

                         if(!valid){
                              document.getElementById("alert6").innerHTML = strmresult;
                              event.preventDefault();
                         }
                    }

                    if(document.upload.age.value == 0){
                         document.getElementById("alert4").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(document.upload.age.value<12 || document.upload.age.value>22){
                              document.getElementById("alert4").innerHTML = ageresult;
                              event.preventDefault();
                         }
                    }
               }

               function photosize(){
                    let photo = document.getElementById("pic");
                    let returnvalue = true;
                    if(document.update.photo.value == ""){
                         document.getElementById("alert6").innerHTML = result;
                         event.preventDefault();
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
                         document.getElementById("alert7").innerHTML = result;
                         event.preventDefault();
                    }
                    else{
                         if(!photosize()){
                              document.getElementById("alert7").innerHTML = result2;
                         }
                    }
               }
          </script>
</body>
</html>