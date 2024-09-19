<?php
     $uname = $_GET['uname'];

     require "config.php";

     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM chat";
     $query3 = "SELECT * FROM admin";

     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);
     $result3 = mysqli_query($db, $query3);

     $present = false;
     $size = 0;
     $size2 = 0;
     $size3 = 0;
     $size4 = 0;
     $messagesent[$size] = [];
     $messagereceived[$size2] = [];
     $messagetimesend[$size3] = [];

     if($result){
          for($i = 0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);
               if($uname === $row['userkey']){
                    $dp = $row['photo'];
                    $username = $row['username'];
               }
          }
     }
     if($result3){
          for($i=0; $i<mysqli_num_rows($result3); $i++){
               $row = mysqli_fetch_array($result3);
               if($row['codename'] === "HM"){
                    $username = $row['username'];
                    $dp1 = $row['photo'];
                    $dp = $dp1;
                    $rank = $row['rank'];
               }
          }
     }

     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);
               if($username === $row['kutoka']){
                    $messagesent[$size] = $row['ujumbe'];
                    $messagetimesend[$size3] = $row['muda'];
                    $size++;
                    $size3++;
               }
               else{
                    if($username === $row['kwenda']){
                         $messagereceived[$size2] = $row['ujumbe'];
                         $messagetimesend[$size3] = $row['muda'];
                         $size2++;
                         $size3++;
                         echo $size2;
                    }
               }
          }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SRSS | Chat</title>
     <link rel="stylesheet" type="text/css" href="chat.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="navigation">
          <img src="media/images/icons/menu.png" class="menu">
          <?php
               echo "<img src='$dp1' id='logo-img'>";
               if($rank == 0){
                   echo "<li><a href='account.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
               }
               else{
                   echo "<li><a href='account-admin.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
               }        
          ?>
     </div>
     <div class="body">
          <div class="chats">
               <div class="chat">
                    <img src="media/images/prof_pics/earth.jpg" class="chat-dp">
                    <a href="chat-block.html">
                         <div class="details">
                              <p class="username">Username</p>
                         </div>
                    </a>
               </div>
               <div class="chat">
                    <img src="media/images/prof_pics/IMG_20180819_121654 (2).jpg" class="chat-dp">
                    <a href="chat-block.html">
                         <div class="details">
                              <p class="username">Username</p>
                         </div>
                    </a>
               </div>
               <div class="chat">
                    <img src="media/images/prof_pics/pexels-azim-islam-460924-1188037.jpg" class="chat-dp">
                    <a href="chat-block.html">
                         <div class="details">
                              <p class="username">Username</p>
                         </div>
                    </a>
               </div>
          </div>
          <div class="textarea">
               <?php

                    if($size>0 || $size2>0){
                         if($size>0){
                              for($i=$size-1; $i>=0; $i--){
                                   echo
                                        "
                                        <div class='chat-block'>
                                             <p class='sent'>
                                                  <span class='send'>$messagesent[$i]</span>
                                                  <span class='time'>$messagetimesend[$i]</span>
                                             </p><br><br>
                                             ";
                              }
                         }
                         if($size2>0){
                              for($i=$size2-1; $i>=0; $i--){
                                   echo 
                                        "
                                             <p class='received'>
                                                       <span class='receive'>$messagereceived[$i]</span>
                                                       <span class='time2'>$messagetimesend[$i]</span>
                                                  </p><br><br>
                                             </div>
                                        ";
                              }
                         }
                    }
                    else{
                         echo
                              "
                                   <div class='chat-block'>
                                        <p class='note'>
                                             Welcome to SRSS-Chat box!
                                        </p><br><br>
                                   </div>
                              ";
                    }                   
               ?>
          </div>
          <div class="message">
               <?php echo "<form action='message.php?uname=$uname' method='POST' enctype='multipart/form-data' name='meseji' class='sms'>";?>
                    <input type="text" name="ujumbe" class="msg" placeholder="Type your message here...">
                    <button onclick="msg()" class="sendbtn" id="go" name="send"><img src="media/icons/send-button.png" class="sendpic"></button>
               </form>
          </div>
     </div>
     <script>

          let menu = document.querySelector('.menu');
          let chat = document.querySelector('.chats');
          let time = document.querySelector('.time');
          let time2 = document.querySelector('.time2');
          let message1 = document.querySelector('.sent');
          let message2 = document.querySelector('.received');
          let message = document.querySelector('.message');
          let n = 0;

          function clicked(n){
               if(n%2 == 0){
                    return true;
               }
               else{
                    return false;
               }
          }

          menu.onclick = function(){
               chat.classList.toggle('open');
               message.style.display = "none";
               chat.style.height = "81vh";
               n++;
               if(clicked(n)){
                    menu.src = "media/images/icons/menu.png";
                    message.style.display = "block";
               }
               else{
                    menu.src = "media/images/icons/remove.png";
                    message.style.display = "none";
               }

          }

          function msg(){
               if(document.meseji.ujumbe.value == ""){
                    alert("Sorry! You cannot send an empty suggestion!");
                    event.preventDefault();
               }
          }

          // message1.onclick = function(){
          //      time.classList.toggle('open');
          // }

          // message2.onclick = function(){
          //      time2.classList.toggle('open');
          // }

          function show(e){
              time.classList.toggle('open');
          }
     </script>
</body>
</html>