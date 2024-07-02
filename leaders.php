<?php

     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);

     if($result){

          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['username'] === $uname){
                    $admin = 1;
                    break;
               }
               else{
                    $admin = 0;
               }
          }
          if($admin == 0){
               include "failed.php";
          }
          else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Admin</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="leaders.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
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
                              <li><a href='home.php?uname=$uname'>Go back</a></li>";

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
     <div class="body">
          <div class="uploads">
               <div class="notes">
                    <h2><?php echo "<a href='check.php?uname=$uname' class='check'>Upload notes Now!!!</a></h2>";?>
               </div>
               <div class="news">
                    <h2><?php echo "<a href='upload_news.php?uname=$uname' class='leaders'>Upload some news Now!!!</a></h2>";?>
               </div>
          </div>
     </div>
     <script src="fetch.js"></script>
 </body>
 </html>
<?php
          }
     }   
?>