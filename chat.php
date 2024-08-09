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
               if($row['rank'] === 1){
                    $sender = $row['username'];
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
          <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
          <?php echo "<a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a>";?>
     </div>
     <div class="body">
          <div class="textarea">
               <?php
                    if($result2){
                         for($i=0; $i<mysqli_num_rows($result2); $i++){
                              $row = mysqli_fetch_array($result2);
                              if($username === $row['kutoka']){
                                   $message = $row['ujumbe'];
                                   $time = $row['muda'];
                                        echo
                                             "<p class='sent'>
                                                  <span class='send'>$message</span>
                                                  <span class='time'>$time</span>
                                             </p><br>";
                              }
                         }
                    }
                    // if($result2){
                    //      for($i=0; $i<mysqli_num_rows($result2); $i++){
                    //           $row = mysqli_fetch_array($result2);
                    //           if($sender === $row['kwenda']){
                    //                $message = $row['message'];
                    //                     echo
                    //                          "<p class='received'>
                    //                               <span class='receive'>$message</span>
                    //                               <span class='time2'>$time</span>
                    //                          </p><br>";
                    //           }
                    //           else{
                    //                echo
                    //                     "<p class='received'>
                    //                          <span style='display: none;'>message</span>
                    //                     </p><br>";
                    //           }
                    //      }
                    // }
                    
               ?>
          </div>
          <div class="message">
               <?php echo "<form action='message.php?uname=$uname' method='POST' enctype='multipart/form-data' name='meseji' class='sms'>";?>
                    <input type="text" name="ujumbe" class="msg">
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
          let n = 0;

          // function clicked(n){
          //      if(n%2 == 0){
          //           return true;
          //      }
          //      else{
          //           return false;
          //      }
          // }

          // menu.onclick = function(){
          //      chat.classList.toggle('open');
          //      n++;
          //      if(clicked(n)){
          //           menu.src = "media/images/icons/menu.png";
          //      }
          //      else{
          //           menu.src = "media/images/icons/remove.png";
          //      }

          // }

          function msg(){
               if(document.meseji.ujumbe.value == ""){
                    alert("Sorry! You cannot send an empty suggestion!");
                    event.preventDefault();
               }
          }

          message1.onclick = function(){
               time.classList.toggle('open');
          }

          // message2.onclick = function(){
          //      time2.classList.toggle('open');
          // }
     </script>
</body>
</html>