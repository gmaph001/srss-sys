<?php

     $size = 0;
     $size2 = 0;
     $size3 = 0;
     $size4 = 0;

     $receivers[$size];
     $receiversdp[$size];
     $received[$size2];
     $sent[$size3];
     $received1[$size3];

     $tuma[$size4];
     $pokea[$size4];

     $uname = $_GET['uname'];
     $receiver = $_GET['receiver'];

     require "config.php";

     $query = "SELECT * FROM students";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['userkey'] === $uname){
                    $sender = $row['username'];
                    $senderdp = $row['photo'];
               }
               else{
                    $receivers[$size] = $row['username'];
                    $receiversdp[$size] = $row['photo'];
                    $size++;
               }
          }
     }

     $query2 = "SELECT * FROM ujumbe";
     $result2 = mysqli_query($db, $query2);

     if($result2){
          for($i=0; $i<mysqli_num_rows($result2); $i++){
               $row = mysqli_fetch_array($result2);

               if($row['kutoka'] === $sender && $row['kwenda'] === $receiver){
                    if($row['kutoka'] === $sender){
                         $sent[$size3] = $row['ujumbe'];
                         $size3++;
                    }
               }
               else if($row['kwenda'] === $sender){
                    $received[$size2] = $row['ujumbe'];
                    $size2++;
               }
               if($row['kutoka'] === $receiver && $row['kwenda'] === $sender){
                    if($row['kutoka'] === $receiver){
                         $received1[$size3] = $row['ujumbe'];
                         $size3++;
                    }
               }
          }
     }

     echo $size3;

     $lastrec = "none";

     for($i=0; $i<$size2; $i++){

          if($i = $size2-1){
               $lastrec = $received[$i];
          }
     }

     $lastrecp = "none";

     $query3 = "SELECT * FROM ujumbe";
     $result3 = mysqli_query($db, $query3);

     if($result3){
          for($i=0; $i<mysqli_num_rows($result3); $i++){
               $row = mysqli_fetch_array($result3);
     
               if($row['ujumbe'] === $lastrec){
                    $lastrecp = $row['kutoka'];
               }
          }
     }

     $lastrecpdp = "none";

     $query4 = "SELECT * FROM students";
     $result4 = mysqli_query($db, $query4);

     if($result4){
          for($i=0; $i<mysqli_num_rows($result4); $i++){
               $row = mysqli_fetch_array($result4);
               if($lastrecp === $row['username']){
                    $lastrecpdp = $row['photo'];
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
     <link rel="stylesheet" type="text/css" href="ujumbe.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="main">
          <div class="sidebar">
               <div class="sidebar-title">
                    <h2>SRSS Chat</h2>
               </div>
               <div class="chats">
                    <?php
                         for($i=0; $i<$size; $i++){
                              echo 
                              "
                                   <div class='conversation'>
                                        <img src='$receiversdp[$i]' class='conv-dp'>
                                        <p class='conv-name'>$receivers[$i]</p>
                                   </div>
                              ";
                         }
                    ?>
               </div>
               <div class="active-chat">
                    <?php
                         echo
                         "
                              <img src='$senderdp' class='conv-dp'>
                              <p class='conv-name'>$sender</p>
                         ";
                    ?>
               </div>
          </div>
          <div class="main-chat">
               <div class="navigation">
                    <img src="media/images/icons/menu.png" class="icons sideopen">
                    <h2>Chat with: </h2>
                    <?php echo "<img src='$lastrecpdp' class='dp'>";?>
               </div>
               <div class="conversation-box">
                    <div class='chat-box'>
                         <?php
                              for($i=0; $i<$size3; $i++){
                                   echo 
                                   "
                                        <div class='sent'>
                                             <p>$sent[$i]</p>
                                        </div>
                                        <div class='received'>
                                             <p>$received1[$i]</p>
                                        </div>
                                   ";
                              }
                         ?>
                    </div>
               </div>
               <form class="msg-box">
                    <input type="text" name="msg" class="message" placeholder="Type anything...">
                    <button class="sendbtn"><img src="media/icons/send-button.png" class="sendpic"></button>
               </form>
          </div>
     </div>
     <script>
          let openside = document.querySelector('.sideopen');
          let side = document.querySelector('.sidebar');
          let main = document.querySelector('.main-chat');
          let conversation = document.querySelector('.conversation-box');
          let msg = document.querySelector('.msg-box');
          let navbar = document.querySelector('.navigation');
          let chat = document.querySelector('.chat-box');

          let n = 0;

          function even(n){
               if(n%2 == 0){
                    return true;
               }
               else{
                    return false;
               }
          }

          openside.addEventListener('click', function(){
               
               n++;

               if(even(n)){
                    side.style.display = "none";
                    main.style.width = "100vw";
                    navbar.style.width = "98vw";
                    conversation.style.width = "95vw";
                    msg.style.width = "98vw";
                    openside.src = "media/images/icons/menu.png";
               }
               else{
                    side.style.display = "block";
                    main.style.width = "75vw";
                    navbar.style.width = "75vw";
                    msg.style.width = "72vw";
                    conversation.style.width = "72vw";
                    openside.src = "media/images/icons/remove.png";
               }

               
          })

          
     </script>
</body>
</html