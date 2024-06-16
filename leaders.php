<?php
     $admin = file_get_contents('is_admin.txt');
     if($admin){
          require_once "config.php";
          $uname = $_GET['uname'];
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
                         <li><a href="upload_news.html">News</a></li>
                         <li><a href="check.php">Notes</a></li>
                         <li><a href="test.php">Users</a></li>
                    </ul>
               </div>
               <div class="vertical_menu">
                    <button><b>MENU</b></p></button>
               </div>
          </div>
          <div class="dropdown_menu">
               <ul type="none">
                    <li><a href="upload_news.html">News</a></li>
                    <li><a href="check.php">Notes</a></li>
                    <li><a href="test.php">Users</a></li>
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
                    <h2><a href="check.php" class="check">Upload notes Now!!!</a></h2>
               </div>
               <div class="news">
                    <h2><a href="upload_news.html" class="leaders">Upload some news Now!!!</a></h2>
               </div>
          </div>
     </div>
     <script src="fetch.js"></script>
 </body>
 </html>
 <?php
     }
else if($admin == "prf"){
     include 'leaders.php';
}
else{
     include 'failed.php';
}

?>