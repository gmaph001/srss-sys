<?php

     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM admin";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    if($row['rank'] != 7){
                         header("location:failed.php?uname=$uname");
                    }
                    else{
                         continue;
                    }
               }
          }
     }
     else{
          header("location:failed.php?uname=$uname");
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration | PHP</title>
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link rel="stylesheet" type="text/css" href="navBar.css">
     <link rel="stylesheet" type="text/css" href="users.css">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <nav class="navigation">
          <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
          <div class="menu">
               <span id="srss"><b>Shaaban Robert Sec School</b></span>
               <div class="horizontal_menu">
                    <ul type="none">
                         <?php
                              echo
                                   "<li><a href='upload_news.php?uname=$uname'>News</a></li>
                                   <li><a href='check.php?uname=$uname'>Notes</a></li>
                                   <li><a href='users.php?uname=$uname'>Users</a></li>
                                   <li><a href='home.php?uname=$uname'>Back</a></li>";

                         ?>
                    </ul>
               </div>
               <div class="vertical_menu">
                    <button><b>MENU</b></p></button>
               </div>
          </div>
          <div class="dropdown_menu">
               <ul type="none">
                    <?php
                         echo
                              "<li><a href='upload_news.php?uname=$uname'>News</a></li>
                              <li><a href='check.php?uname=$uname'>Notes</a></li>
                              <li><a href='test.php?uname=$uname'>Users</a></li>
                              <li><a href='home.php?uname=$uname'>Back</a></li>";

                    ?>
          </div>
     </nav>
     <script>
          let menubtn = document.querySelector('.vertical_menu');
          let dropdownlist = document.querySelector('.dropdown_menu');
          let multimenu = document.querySelector('.multi_menu');
          let submenu = document.querySelector('.sub_menu');

          menubtn.onclick = function(){
               dropdownlist.classList.toggle('open');
          }

          multimenu.onclick = function(){
               submenu.classList.toggle('open');
          }
     </script>
     <center>
          <div class="body">
               <div class="data">
                    <table border="2">
                         <tr class="header">
                              <td>Students_ID</td>
                              <td>Firstname</td>
                              <td>Secondname</td>
                              <td>Lastname</td>
                              <td>Username</td>
                              <td>Email</td>
                              <td>Password</td>
                              <td>Form</td>
                              <td>Stream</td>
                              <td>Age</td>
                         </tr>
                              <?php
                                   require_once "config.php";

                                   $data = "SELECT * FROM students ORDER BY Students_ID";

                                   $result = mysqli_query( $db, $data );

                                   
                              ?>

                              <?php

                                   if( mysqli_num_rows($result) > 0 ) {
                                        for($i = 0; $i<mysqli_num_rows($result); $i++){
                                             $user = mysqli_fetch_array($result);
                              ?>
                                             <tr>
                                                  <td>
                                                       <?php
                                                            echo $user["Students_ID"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["firstname"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["secondname"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["lastname"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["username"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["email"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["password"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["form"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["stream"];
                                                                 
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php
                                                            echo $user["age"];
                                                                 
                                                       ?>
                                                  </td>
                                             </tr>
                              <?php
                                        }
                                   }
                              ?>
                    </table>
               </div>
          </div>
     </center>
</body>
</html>