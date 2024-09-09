<?php
     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $firstname = $row['firstname'];
                    $secondname = $row['secondname'];
                    $lastname = $row['lastname'];
                    $age = $row['age'];
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
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <nav class="navigation">
          <div class="title">
               <div class="menubtn"><img src="media/images/icons/menu.png" class="menu" id="menu"></div>
               <span id="heading"><b>Shaaban Robert Secondary School</b></span>
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
                              <li><b><a href='chat.php?uname=$uname'>Suggestions</a></b></li>";
                    ?>
               </ul>
          </div>
          <div class="main">
               <?php
                    echo
                         "<form action='update.php?uname=$uname' method='POST' name='upload' class='update' enctype='multipart/form-data'>
                         <fieldset>
                         <legend><b>My Profile</b></legend> 
                                   <label><b>First Name: </b></label> <input type='text' name='firstname' value='$firstname' placeholder='change'><br><br>
                                   <label><b>Second Name: </b></label> <input type='text' name='secondname' value='$secondname' placeholder='change'><br><br>
                                   <label><b>Last Name: </b></label> <input type='text' name='lastname' value='$lastname' placeholder='change'><br><br>
                                   <label><b>Age: </b></label> <input type='number' name='age' value='$age' placeholder='change'><br><br>
                                   <label><b>Class: </b></label> <input type='number' name='class' value='$class' placeholder='change'><br><br>
                                   <label><b>Stream: </b></label> <input type='text' name='stream' value='$stream' placeholder='change'><br><br>";
               ?>
                         <button onclick="save()" class="save" name="save">Save</button> 
                    </fieldset>
               </form>
          </div>
          <div class="profile">
               <?php
                    echo
                         "<form action='update_photo.php?uname=$uname' method='POST' name='update' class='update' enctype='multipart/form-data'>
                              <img src='$photo' class='photo' width='200px' height='250px'><br><br>
                              <label><b>Upload your photo: </b></label><input type='file' id='pic' name='photo' value='none'><br><br>
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
          <p>&copy; Shaaban Robert Secondary School 2024.</p>
     </div>
     <script src="account.js"></script>
     <script>
               let result = "*Please fill this field!*";
               let result2 = "*File too large to be submitted!*";

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
</body>
</html>