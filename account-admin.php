<?php
     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM admin";
     $query2 = "SELECT * FROM students";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $firstname = $row['firstname'];
                    $secondname = $row['secondname'];
                    $lastname = $row['lastname'];
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
    <title>SRSS | My Account</title>
    <link rel="stylesheet" href="account.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
                              "<li><a href='account-admin.php?uname=$uname'>My Profile</a></li>
                              <li><a href='security.php?uname=$uname'>Privacy & Security</a></li>
                              <li><b><a href='home.php?uname=$uname'>Home</a></b></li>";
                    ?>
               </ul>
          </div>
          <div class="main">
               <?php
                    echo
                         "<form action='update2.php?uname=$uname' method='POST' name='update' class='update' enctype='multipart/form-data'>
                         <fieldset>
                         <legend><b>My Profile</b></legend> 
                                   <label><b>First Name: </b></label> <input type='text' name='firstname'value='$firstname' placeholder='change'><br>
                                   <p id='alert' class='alert'></p><br>
                                   <label><b>Second Name: </b></label> <input type='text' name='secondname' value='$secondname' placeholder='change'><br>
                                   <p id='alert2' class='alert'></p><br>
                                   <label><b>Last Name: </b></label> <input type='text' name='lastname' value='$lastname' placeholder='change'><br>
                                   <p id='alert3' class='alert'></p><br>
                                   <label><b>Rank: </b></label> <input type='number' name='rank' value='$rank' placeholder='change'><br>
                                   <p id='alert4' class='alert'></p><br>
                                   <label><b>Codename: </b></label> <input type='text' name='codename' value='$codename' placeholder='change'><br>
                                   <p id='alert5' class='alert'></p><br>";
               ?>
                         <button onclick="save()" class="save" name="save">Save</button> 
                    </fieldset>
               </form>
          </div>
          <div class="profile">
               <?php
                    echo
                         "<form action='update_photo.php?uname=$uname' method='POST' name='update' class='update-photo' enctype='multipart/form-data'>
                              <img src='$photo' class='photo' width='200px' height='250px'><br><br>
                              <label><b>Upload your photo: </b></label><input type='file' name='photo'><br><br>
                              <button onclick='savephoto()' class='save' name='savephoto'>Save</button>                                          
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


               ?>
          </div>
          <script>
               function save() {
                    if(document.upload.firstname.value == ""){
                         alert("Please enter your first name");
                         event.preventDefault();
                    }
                    if(document.upload.secondname.value == ""){
                         alert("Please enter your second name");
                         event.preventDefault();
                    }
                    if(document.upload.lastname.value == ""){
                         alert("Please enter your last name");
                         event.preventDefault();
                    }
                    if(document.upload.rank.value == ""){
                         alert("Please enter your rank");
                         event.preventDefault();
                    }
                    if(document.upload.codename.value == ""){
                         alert("Please enter your codename");
                         event.preventDefault();
                    }
               }
          </script>
     <div class="footer">
          <p>&copy; Shaaban Robert Secondary School 2023.</p>
     </div>
     <script src="account.js"></script>
</body>
</html>