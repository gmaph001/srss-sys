<?php
    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $news = $_GET['news'];

    $query = "SELECT * FROM news";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['news_no'] === $news){
                $photo = $row['news_photo'];
            }
        }
    }

    $query2 = "SELECT * FROM admin";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($uname === $row['userkey']){
                $dp = $row['photo'];
                $rank = $row['rank'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | News-Sports</title>
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
            <div class="newsedit">
                <?php
                    echo 
                        "
                                <form action='editphoto.php?uname=$uname&&news=$news' class='editnews' method='POST' enctype='multipart/form-data'>
                                    <center>
                                        <h1>Edit your posted photo here:</h1><br>
                                        <img src='$photo' class='photo'><br><br>
                                        <input type='file' id='habari' name='news' class='correct'><br><br>
                                        <button onclick='correct()' class='edit'>Edit</button>
                                    </center>
                                </form>
                        ";
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
            <p class="foot"><b>&copy; Shaaban Robert Secondary School 2024.</b></p>
        </div>
    </div>
    
    <div class="bottom">
     <div class="bottom-home">
          <a href='home.html' class="home">
               <img src="media/icons/home.png" class="icon">
          </a>
     </div>
     <div class="bottom-nav">
          <ul type="none">
               <li>
                    <a href='news.html' class="buttons">
                         <img src="media/icons/news.png" class="icon">  
                         <p>News</p>
                    </a>
               </li>
               <li>
                    <a href='notes.html' class="buttons" id="left">
                         <img src="media/icons/notes.png" class="icon">  
                         <p>Notes</p>
                    </a>
               </li>
               <li>
                    <a href='assignment.html' class="buttons" id="right">
                         <img src="media/icons/assignment.png" class="icon">  
                         <p>Assignments</p>
                    </a>
               </li>
               <li>
                    <a href='user.php' class="buttons">
                         <img src="media/icons/user.png" class="icon">  
                         <p>Login</p>
                    </a>
               </li>
          </ul>
     </div>
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

        function correct(){

            if(document.getElementById("habari").value === ""){
                alert("You cannot submit empty news!");
                event.preventDefault();
            }
        }
    </script>
</body>
</html>