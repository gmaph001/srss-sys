<?php

     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     require "timer.php";

     $exist = false;

     $query = "SELECT * FROM admin";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    $rank = $row['rank'];
                    $exist = true;
                    break;
               }
          }
     }
     if($exist){
          if($rank != 7){
               header("location:failed.php?uname=$uname");
          }
     }
     else{
          header("location:failed.php?uname=$uname");
     }

     $query2 = "SELECT * FROM students";
     $result2 = mysqli_query($db, $query2);

     $id = [];
     $username = [];
     $email = [];
     $photo = [];
     $class = [];
     $stream = [];
     $rank = [];
     $key = [];
     $size = 0;

     for($i=0; $i<mysqli_num_rows($result2); $i++){
          $row = mysqli_fetch_array($result2);

          $id[$size] = $row['Students_ID'];
          $username[$size] = $row['username'];
          $photo[$size] = $row['photo'];
          $email[$size] = $row['email'];
          $class[$size] = $row['form'];
          $stream[$size] = $row['stream'];
          $key[$size] = $row['userkey'];
          $size++;
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SRSS | Users</title>
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
                              echo "
                                        <li><a href='upload_news.php?uname=$uname'>News</a></li>
                                        <li><a href='check.php?uname=$uname'>Notes</a></li>
                                        <li><a href='users.php?uname=$uname'>Users</a></li>
                                        <li><a href='home.php?uname=$uname'>Back</a></li>        
                                   ";
                         ?>
                    </ul>
               </div>
          </div>
     </nav>
     <div class="body">
          <div class="search">
               <input type="text" id="search" class="searchbar" name="search" placeholder="Search users here...">
          </div>
          <div class="search2">
               <input type="text" id="search2" class="searchbar" name="search" placeholder="Search users here...">
          </div>
          <div class="result" id="result">
               
          </div>
          <div class="main">
               <?php
                    for($j=$size-1; $j>=0; $j--){
                         echo "
                              <div class='account'>
                                   <img src='$photo[$j]' class='prof_pic'>
                                   <div class='profile'>
                                        <p>USERNAME: <span class='detail'>$username[$j]</span></p><br>
                                        <p>EMAIL: <span class='detail'>$email[$j]</span></p><br>
                                        <p>FORM: <span class='detail'>$class[$j]</span></p><br>
                                        <p>STREAM: <span class='detail'>$stream[$j]</span></p><br>
                              ";

                         $exist = false;
                         $dev = false;

                         $chkquery = "SELECT * FROM admin";
                         $chkres = mysqli_query($db, $chkquery);

                         for($i=0; $i<mysqli_num_rows($chkres); $i++){
                              $row = mysqli_fetch_array($chkres);

                              if($key[$j] === $row['userkey']){
                                   $exist = true;
                                   if($row['rank'] === "7"){
                                        $dev = true;
                                   }
                                   break;
                              }
                         }

                         if($exist){
                              if($dev){
                                   echo "
                                             <p>RANK: <span class='detail'>DEVELOPER</span></p>
                                        </div>
                                             <div class='btns'>
                                                  <a href='revoke.php?uname=$uname&&id=$key[$j]' class='revoke'>Revoke</a>
                                             </div>
                                        </div>
                                        ";
                              }
                              else{
                                   echo "
                                             <p>RANK: <span class='detail'>PREFECT</span></p>
                                        </div>
                                             <div class='btns'>
                                                  <a href='revoke.php?uname=$uname&&id=$key[$j]' class='revoke'>Revoke</a>
                                             </div>
                                        </div>
                                        ";
                              }
                         }
                         else{
                              echo "
                                        <p>RANK: <span class='detail'>COMMON</span></p>
                                   </div>
                                        <div class='btns'>
                                             <a href='approve.php?uname=$uname&&id=$key[$j]' class='approve'>Invoke</a>
                                        </div>
                                   </div>
                                   ";
                         }
                    }
               ?>
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
                                   <a href='upload_news.php?uname=$uname' class='buttons'>
                                        <img src='media/icons/news.png' class='icon'>  
                                        <p>News</p>
                                   </a>
                              </li>
                              <li>
                                   <a href='check.php?uname=$uname' class='buttons'>
                                        <img src='media/icons/notes.png' class='icon'>  
                                        <p>Notes</p>
                                   </a>
                              </li>
                         </ul>
                    </div>
               </div>";
     ?>
     <script src="jquery/jquery.js"></script>
     <script>
          $(document).ready(function(){

               $("#search").keyup(function(){

                    var input = $(this).val();
                         // alert(input);

                    if(input != ""){
                         $.ajax({
                              <?php echo "url: 'usersearch.php?uname=$uname'";?>,
                              method: "POST",
                              data: {input:input},

                              success:function(data){
                                   $("#result").html(data);
                                   $("#result").css("display","grid");
                                   $(".main").css("display","none");
                              }
                         });
                    }
                    else{
                         $("#result").css("display","none");
                         $(".main").css("display","grid");
                    }
               })

               $("#search2").keyup(function(){

                    var input = $(this).val();
                         // alert(input);

                    if(input != ""){
                         $.ajax({
                              <?php echo "url: 'usersearch.php?uname=$uname'";?>,
                              method: "POST",
                              data: {input:input},

                              success:function(data){
                                   $("#result").html(data);
                                   $("#result").css("display","flex");
                                   $(".main").css("display","none");
                              }
                         });
                    }
                    else{
                         $("#result").css("display","none");
                         $(".main").css("display","flex");
                    }
               })
          })    
     </script>
</body>
</html>