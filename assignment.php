<?php

     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM assignments";
     $query2 = "SELECT * FROM students";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);

     $assignment_no;
     $assignment;
     $subjectname;
     $subject;
     $due;
     $assign;
     $subject_no = 0;

     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $student = mysqli_fetch_array($result2);

               if($uname === $student['userkey']){
                    $class = $student['form'];
                    $stream = $student['stream'];
                    $dp = $student['photo'];
               }
          }
     }
     else{
          header('location:home.php?uname='.$uname);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Home</title>
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
                         <li><?php echo "<a href='assignment.php?uname=$uname'>Assign</a>";?> </li>
                         <li class="multi_menu"><a>login</a></li>
                         <li><?php echo "<li><a href='account.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";?></li>
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
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_assoc($result);
                         if($class === $row['class'] && $stream === $row['stream']){
                              $assignment_no = $row['assign_ID'];
                              $assignment = $row['assignment'];
                              $subject = strtoupper($row['subject']);
                              $subjectname = strtolower($row['subject']);
                              $assign = $row['assign_date'];
                              $due = $row['due_date'];
                          
                         echo 
                         "
                              <div class='assign'>
                                   <div class='$subjectname'>
                                        <div class='subjectname'>
                                             <a href='$assignment' target='_blank' style='text-decoration: none'>$subject</a>
                                        </div>
                                   </div>
                                   <div class='details'>
                                        <div class='subjectname'>
                                             <p>Assignment ID: $assignment_no</p>
                                        </div>
                                        <div class='dates'>
                                             <div class='assigned'>
                                                  $assign
                                             </div>
                                             <div class='due'>
                                                  $due
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         ";
                         }
                         
                    }
               ?>
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
               <p class="foot"><b>&copy; Shaaban Robert Secondary School 2023.</b></p>
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
                                   <a href='assignment.php?uname=$uname' class='buttons' id='right'>
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