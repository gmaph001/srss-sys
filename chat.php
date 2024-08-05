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
                    $sender = "HEADMASTER";
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
                              if($username === $row['username']){
                                   $message = $row['message'];
                                   if($message == ""){
                                        $present = false;
                                        echo
                                             "<p class='sent'>
                                                  <span class='send'>Sent!</span>
                                             </p><br>";
                                   }
                                   else{
                                        $present = true;
                                        echo
                                             "<p class='sent'>
                                                  <span class='send'>$message</span>
                                             </p><br>";
                                   }
                              }
                         }
                    }
                    else{
                         if(!$present){
                              echo
                                   "<p class='sent'>
                                        <span class='send'>No message</span>
                                   </p><br>";
                         }
                    }
                    if($result2){
                              for($i=0; $i<mysqli_num_rows($result2); $i++){
                                   $row = mysqli_fetch_array($result2);
                                   if($sender === $row['username']){
                                        $message = $row['message'];
                                        if($message == ""){
                                             $present = false;
                                             echo
                                                  "<p class='received'>
                                                       <span class='receive'>Received!</span>
                                                  </p><br>";
                                        }
                                        else{
                                             $present = true;
                                             echo
                                                  "<p class='received'>
                                                       <span class='receive'>$message</span>
                                                  </p><br>";
                                        }
                                   }
                              }
                         }
                         else{
                              if(!$present){
                                   echo
                                        "<p class='sent'>
                                             <span class='send'>No message</span>
                                        </p><br>";
                              }
                         }
               ?>
               <p class="received">
                    <span class="receive">Received!</span>
               </p><br>
          </div>
          <div class="message">
               <form action="message.php?uname=$uname" method="POST" enctype="multipart/form-data" name="meseji" class="sms">
                    <input type="text" name="ujumbe" class="msg">
                    <button onclick="msg()" class="send" id="go">Send</button>
               </form>
          </div>
     </div>
     <script>
          function msg(){
               if(document.meseji.ujumbe.value == ""){
                    alert("Sorry! You cannot send an empty suggestion!");
                    event.preventDefault();
               }
          }
     </script>
</body>
</html>