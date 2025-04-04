<?php

     require_once "config.php";
     require "address.php";

     $news = $_GET['news'];

     $uname = $_GET['uname'];
     $edit = false;
     $rank = 0;

     require "timer.php";
     
     $query = "SELECT * FROM news";
     $query1 = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result1 = mysqli_query($db, $query1);
     $result2 = mysqli_query($db, $query2);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);
               if($news === $row['news_no']){
                    $news_main = $row['news_main'];
                    $announcerID = $row['announcer_ID'];
                    $announcerName = $row['announcer_name'];
                    $newsphoto = $row['news_photo'];
               }
          }
     }

     if ($result1) {
          for($i=0; $i<mysqli_num_rows($result1); $i++){
               $row = mysqli_fetch_array($result1);

               if($row['userkey'] === $uname){
                    $dp = $row['photo'];
               } 
          }
     }
     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($row['userkey'] === $uname){
                    $dp = $row['photo'];
                    $rank = $row['rank'];
               }
               if($row['userkey'] === $announcerID){
                    $dp2 = $row['photo'];
                    $rank2 = $row['rank'];
                    if($rank2 == 1){
                         $announcer_rank = "HEADMASTER";
                    }
                    else if($rank2 == 2){
                         $announcer_rank = "DEPUTY HEADMISTRESS";
                    }
                    else if($rank2 == 3){
                         $announcer_rank = "ACADEMIC COORDINATOR";
                    }
                    else if($rank2 == 4){
                         $announcer_rank = "DISCIPLINE MASTER";
                    }
                    else if($rank2 == 5){
                         $announcer_rank = "TEACHER";
                    }
                    else if($rank2 == 6){
                         $announcer_rank = "PREFECT";
                    }
                    else{
                         $announcer_rank = "DEVELOPER";
                    }
               }

               if($uname === $announcerID){
                    $edit = true;
               }
          }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | News-Info</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="newsInfo.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <nav class="navigation">
          <div class="pics">
               <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
               <?php 
                    if($rank == 0){
                         echo "<li><a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";
                    }
                    else{
                         echo "<li><a href='account-admin.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";
                    }        
               ?>
          </div>
          <div class="menu">
               <span id="srss"><b>Shaaban Robert Sec School</b></span>
               <div class="horizontal_menu">
                    <ul type="none">
                         <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                         <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                         <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                         <li><?php echo "<a href='check3.php?uname=$uname'>Assign</a>";?> </li>
                         <li class="multi_menu"><a>login</a></li>
                         <li>
                         <?php 
                              if($rank == 0){
                                   echo "<li><a href='account.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
                              }
                              else{
                                   echo "<li><a href='account-admin.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
                              }        
                         ?>
                         </li>
                    </ul>
               </div>
               <div class="vertical_menu">
                    <button><b>MENU</b></p></button>
               </div>
          </div>
          <div class="dropdown_menu">
               <ul type="none">
                    <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                    <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                    <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                    <li><a href="index.php">Student</a></li>
                    <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
          </div>
     </nav>
     <div class="main">
          <div class="sub_menu">
               <ul>
                    <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
                    <li><a href="index.php"><b>login</b></a></li>
               </ul>
          </div>
          <div class="body">
               <div class="details">
                    <?php
                         echo 
                              "
                                   <p class='announcer'>
                                        <img src='$dp2' class='announcer-pic'>
                                   </p><br>
                                   <div class='habari'>
                                        <a href='$newsphoto' target='_blank'><img src='$newsphoto' class='newsphoto'></a>
                                        <p class='main-news'>
                                             $news_main
                                        </p>
                                   </div><br>
                                   <div class='bottom-post'>
                                        <p class='remarks'>
                                             <i>By $announcerName</i><br>
                                             $announcer_rank.
                                        </p>
                                   ";
                         
                         if($edit){
                              echo "
                                        <a href='newsedit.php?uname=$uname&&news=$news' class='edit'>Edit</a>
                                        <a class='delete' id='show'>Delete</a>
                              ";
                         }
                         else if($rank<5){
                              echo "
                                        <a class='delete' id='show'>Delete</a>
                                   </div>
                                   ";
                         }
                              
                    ?>
               </div>
          </div>
          <div class="popup">
               <div class="popup-content">
                    <p>Are you sure you want to delete this post?</p><br>
                    <div class="popbtns">
                         <?php echo "<a href='deleteNews.php?uname=$uname&&news=$news' class='edit'>Yes</a>";?>
                         <a class="delete" id="close">No</a>
                    </div>
               </div>
          </div>
     </div>
     <div class="footer">
          <p>
               For any inquiry and suggestions about this website, please leave your comment below:
          </p><br>
          <form action="https://formspree.io/f/mwkgkgbv" method="POST" name="myForm">
               <fieldset>
                    <label><b>Name:</b></label>&nbsp; <input type="text" name="name" id="fname"><br><br>
                    <label><b>Email:</b></label>&nbsp; <input type="text" name="email" id="email"><br><br>
                    <label><b>Suggestions:</b></label><br><br>
                    <textarea name="suggestions" cols="15" rows="5" maxlength="500"></textarea><br><br>
                    <button><b>Send</b></button>
               </fieldset>
          </form><br><br>
          <p class="foot"><b>&copy; Shaaban Robert Secondary School 2024.</b></p>
     </div>
     <?php
          echo "
               <div class='bottom'>
                    <div class='bottom-home'>
                         <a href='home.php?uname=$uname' class='home'>
                              <img src='media/icons/home.png' class='icon'>
                         </a>
                    </div>
                    <div class='bottom-nav'>
                         <ul type='none'>
                              <li>
                                   <a href='news.php?uname=$uname' class='buttons'>
                                        <img src='media/icons/news.png' class='icon'>  
                                        <p>News</p>
                                   </a>
                              </li>
                              <li>
                                   <a href='notes.php?uname=$uname' class='buttons' id='left'>
                                        <img src='media/icons/notes.png' class='icon'>  
                                        <p>Notes</p>
                                   </a>
                              </li>
                              <li>
                                   <a href='check3.php?uname=$uname' class='buttons' id='right'>
                                        <img src='media/icons/assignment.png' class='icon'>  
                                        <p>Assignments</p>
                                   </a>
                              </li>
                              <li>
                                   <a href='user.php?uname=$uname' class='buttons'>
                                        <img src='media/icons/user.png' class='icon'>  
                                        <p>Login</p>
                                   </a>
                              </li>
                         </ul>
                    </div>
               </div>";
     ?>
     <script>
          let menubtn = document.querySelector('.vertical_menu');
          let dropdownlist = document.querySelector('.dropdown_menu');
          let multimenu = document.querySelector('.multi_menu');
          let submenu = document.querySelector('.sub_menu');

          let delbtn = document.getElementById('show');
          let pop = document.querySelector('.popup');
          let closebtn = document.getElementById('close');

          menubtn.onclick = function(){
               dropdownlist.classList.toggle('open');
          }

          multimenu.onclick = function(){
               submenu.classList.toggle('open');
          }

          document.getElementById("show").addEventListener('click', function(){
               pop.style.display = "block";
          })

          closebtn.onclick = function(){
               pop.style.display = "none";
          }
     </script>
</body>
</html>