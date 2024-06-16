<?php

    require_once "config.php";

    $query = "SELECT * FROM news";

    $result = mysqli_query($db, $query);

    $news = [];

    $empty;

    if(mysqli_num_rows($result) > 0){        
        for($i = 0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['news_class'] === "academics"){
                $news[$i] = $row['news_main'];
            }
        }
    }
    else{
        $news = ["There is no any new announcement in this category!"];
    }

    $uname = $_GET['uname'];

    $query = "SELECT * FROM students";

    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row= mysqli_fetch_array($result);

            if($row['username'] === $uname){
                $dp = $row['photo'];
            } 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>SRSS | News-Academics</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="academics.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
    <nav class="navigation">
        <div class="pics">
            <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
            <?php echo "<a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";?>
        </div>
        <div class="menu">
            <span id="srss"><b>Shaaban Robert Sec School</b></span>
            <div class="horizontal_menu">
                <ul type="none">
                    <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                    <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                    <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                    <li class="multi_menu"><a>login</a></li>
                    <li><?php echo "<a href='account.php?uname=$uname'><img src='$dp' width='50px' height='50px' class='dp'></a></li>";?>
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
    <div class="sub_menu">
        <ul>
            <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
            <li><a href="index.php"><b>Student</b></a></li>
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
    </script>
        <div class="body">
            <div class="announcements">
               <div class="announcement01">
                    <div class="pic1">
                    </div>
               </div>
               <div class="announcement-wrd01">
                    <p style="color: red;">
                         Hi guys! I would like to announce about the academic issues as follows:
                    </p>
                    <p>
                        <b>
                            <?php
                                for($i=0; $i<sizeof($news); $i++){
                                    echo "<p>$news[$i]</p><br>";
                                }
                            ?>
                        </b>
                    </p>
                </div>
            </div>
            <div class="announcements">    
               <div class="announcement02">
                    <div class="pic2">
                    </div>
               </div>
               <div class="announcement-wrd02">
                    <p>
                        The second announcement is that, we are expecting to start our exams on the date: .................
                    </p>
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
        <p class="foot"><b>&copy; Shaaban Robert Secondary School 2023.</b></p>
    </div>
   </body>
   </html>