<?php

     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM assignments";
     $query2 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     $size = 0;

     
     $assignment_no[$size] = [];
     $assignment[$size] = [];
     $subjectname[$size] = [];
     $subject[$size] = [];
     $due[$size] = [];
     $assign[$size] = [];
     $date = date_default_timezone_set('Africa/Nairobi');
     if($date){
          $day = date('Y-m-d');
          $today = filter_var($day, FILTER_SANITIZE_NUMBER_INT);
     }
     else{
          $today = "Error in timezone";
     }
     $subject_no = 0;



     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $admin = mysqli_fetch_array($result2);

               if($uname === $admin['userkey']){
                    $somo = $admin['subject'];
                    $dp = $admin['photo'];
                    $rank = $admin['rank'];
               }
          }
          if($rank <= 3){
               $somo = "ALL";
          }
     }
     else{
          if($subject == NULL){
               include "failed.php?uname=$uname";
          }
          else{
               header('location:home.php?uname='.$uname);
          }
     }

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($somo === $row['subject']){
                    $assignment_no[$size] = $row['assign_ID'];
                    $assignment[$size] = $row['assignment'];
                    $subject[$size] = strtoupper($row['subject']);
                    $subjectname[$size] = strtolower($row['subject']);
                    $assign[$size] = $row['assign_date'];
                    $due[$size] = $row['due_date'];

                    $size++;
               }
               elseif ($somo === "ALL") {
                    $assignment_no[$size] = $row['assign_ID'];
                    $assignment[$size] = $row['assignment'];
                    $subject[$size] = strtoupper($row['subject']);
                    $subjectname[$size] = strtolower($row['subject']);
                    $assign[$size] = $row['assign_date'];
                    $due[$size] = $row['due_date'];

                    $size++;
               }
          }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Assignments</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="assignment.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <nav class="navigation">
          <div class="pics">
               <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
               <?php
                         echo "<li><a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";     
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
                         <li><?php echo "<li><a href='account-admin.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";?></li>
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
     <div class="body">
          <div class="sub_menu">
               <ul>
                    <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
                    <li><a href="index.php"><b>login</b></a></li>
               </ul>
          </div>
          <div class="assignments">
               <?php
                    if($size > 0){
                         for($i=$size-1; $i>0; $i--){
                              $date = filter_var($due[$i], FILTER_SANITIZE_NUMBER_INT);

                              if($today<=$date){
                                   $subject_no++;
                                   echo "
                                             <script>
                                                  let due = document.querySelector('due');
                                                  due.style.color = black;
                                             </script>
                                        ";
                              }
                          
                         echo 
                         "
                              <div class='assign'>
                                   <div class='$subjectname[$i]'>
                                        <div class='subjectname'>
                                             <a href='$assignment[$i]' target='_blank' style='text-decoration: none'>$subject[$i]</a>
                                        </div>
                                   </div>
                                   <div class='details'>
                                        <div class='subjecttitle'>
                                             <p>Assignment ID: $assignment_no[$i]</p>
                                        </div>
                                        <div class='dates'>
                                             <div class='assigned'>
                                                  Assigned: $assign[$i]
                                             </div>
                                             <div class='due'>
                                                  Due: $due[$i]
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         ";
                         }
                    }
               ?>
          </div>
          <?php
               if($subject_no>0){
                    echo
                         "
                              <div class='notification'>
                                   <div class='header'>
                                        <p id='notifheader'>Notification</p>
                                        <p id='notification'>There are $subject_no new assignments, not due yet!</p>
                                   </div>
                              </div>
                         ";
               }
          ?>
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

          menubtn.onclick = function(){
               dropdownlist.classList.toggle('open');
          }

          multimenu.onclick = function(){
               submenu.classList.toggle('open');
          }
     </script>
</body>
</html>