<?php
    require_once "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $rank = 0;

    require "timer.php";

    $query = "SELECT * FROM students";
    $query2 = "SELECT * FROM admin";

    $result = mysqli_query($db, $query);
    $result2 = mysqli_query($db, $query2);

    if ($result) {
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

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
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Notes</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="notes.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navigation">
        <div class="pics">
            <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
            <?php
                if($rank == 0){
                    echo "<a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a>";
                }
                else{
                    echo "<a href='account-admin.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a>";
                }
            ?>
            <a href='account.html' class='dp1'><img src='media/images/prof_pics/1711895902133.jpg' class='dp'></a>
        </div>
        <div class="menu">
            <span id="srss">Najifunza</span>
            <div class="horizontal_menu">
                <ul type="none">
                    <?php
                        echo "<li><a href='home.php?uname=$uname' class='home'>Home</a></li>";
                        echo "<li><a href='news.php?uname=$uname' class='news'>News</a></li>";
                        echo "<li><a href='notes.php?uname=$uname' class='notes'>Notes</a></li>";
                        
                        if($rank>0){
                            echo "<li><a href='leaders.php?uname=$uname'>Admin</a></li>";
                        }
                                                
                        echo "<li><a class='multi_menu'><img src='$dp' class='dp'></a></li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="sub_menu">
        <ul>
            <?php
                if($rank == 0){
                    echo "<li><a href='account.php?uname=$uname'>My Profile</a></li>";
                    echo "<li><a href='assignment.php?uname=$uname' class='notes'>Assignments</a></li>";
                }
                else{
                    echo "<li><a href='account-admin.php?uname=$uname'>My Profile</a></li>";
                    if($rank<6){
                        echo "<li><a href='assignment2.php?uname=$uname' class='notes'>Assignments</a></li><br><br>";
                    }
                    else{
                        echo "<li><a href='assignment.php?uname=$uname' class='notes'>Assignments</a></li><br><br>";
                    }
                }
                echo "<a href='logout.php?uname=$uname' class='logout'>Logout</a>";
            ?>
        </ul>
    </div>
        <div class="body">
            <div class="classes">
                <div class="row">
                    <div class="class">
                        <div class="form1">
                            
                        </div>
                        <div class="info">
                            <p>
                                Hello!! Dear Form 1, you're welcome at SRSS. This part is for you to 
                                get all the necessary materials for Form 1. All necessary notes are here,
                                 you're welcome. <i>Click the button below to get the materials you need.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=1' class='button'><b>Form 1</b></a>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form2">
                            
                        </div>
                        <div class="info">
                            <p>
                                Form 2 student, thanks for revisiting this website and if it is your first time 
                                you're welcome. As usual, all necessary materials for form 2 are here. You may
                                 download them if you want.
                                 <i>Click the button below.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=2' class='button'><b>Form 2</b></a>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form3">
                            
                        </div>
                        <div class="info">
                            <p>
                                It's another warm day, and now you're in Form three. What are you waiting for?
                                 <i>Click the button below and get all the notes you need, or else it is your loss.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=3' class='button'><b>Form 3</b></a>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form4">
                            
                        </div>
                        <div class="info">
                            <p>
                                We do not want to say much, you're grown ups now. You know what to do and how to do 
                                it. So, don't waste time and get all your materials now, go study you kid. 
                                <i>Click the button below.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=4' class='button'><b>Form 4</b></a>";
                                ?>
                            </center>
                        </div> 
                    </div>                                                           
                    <div class="class">
                        <div class="form5">
                            
                        </div>
                        <div class="info">
                            <p>
                                Oh! Hello! You're welcome at SRSS. This is a digitized school with all its 
                                materials in this website. Please, get in, dive, dig and get all necessary 
                                materials for any combination you're studying. 
                                <i>Click the link below to get the materials.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=5' class='button'><b>Form 5</b></a>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form6">
                            
                        </div>
                        <div class="info">
                            <p>
                                Hi! We as developers, welcome you in this website to now end your secondary 
                                school journey, happily. How will you do that? Please, <i>Click the button below.</i>
                            </p><br><br>
                            <center>
                                <?php 
                                    echo "<a href='class.php?uname=$uname&&class=6' class='button'><b>Form 6</b></a>";
                                ?>
                            </center>
                        </div>
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
          <p class="foot"><b>&copy; Najifunza.org 2025</b></p>
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
    <script src="navBar.js"></script>
</body>
</html>