<?php

    require_once "config.php";
    require "address.php";

    $uname = $_GET['uname'];

    require "timer.php";

    $query = "SELECT * FROM news";
    $result = mysqli_query($db, $query);

    $size = 0;
    $n = 0;

    $headline = [];
    $news = [];
    $id[$size] = [];

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['news_updates'] === "important"){
                $size++;
                $headline[$size] = $row['headline'];
                $news[$size] = $row['news_class'];
                $id[$size] = $row['news_no'];
            }
        }
    }    

    $rank = 0;

    $query1 = "SELECT * FROM students";
    $query2 = "SELECT * FROM admin";

    $result1 = mysqli_query($db, $query1);
    $result2 = mysqli_query($db, $query2);

    if ($result1) {
        for($i=0; $i<mysqli_num_rows($result1); $i++){
            $row = mysqli_fetch_array($result1);

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
    <title>SRSS | News</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="news.css">
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
            <div class="updates">
                <div class="update_photo">
                    
                </div>
                <div class="update_announcement">
                    <div class="announcement">
                        <p>
                            <b>
                                <?php
                                    if(sizeof($headline) > 0){        
                                        for($i = sizeof($headline); $i>0; $i--){
                                            if($n != 5){
                                                echo "<p><a href='newsInfo.php?uname=$uname&&news=$id[$i]'>$headline[$i]</a></p><br>";
                                                $n++;
                                            }
                                            else{
                                                break;
                                            }
                                        }
                                    }
                                    else{
                                        $news = "There is no any new announcement in this category!";
                                        echo "<p><a href='#'>$news</a></p><br>";
                                    }
                                ?>
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="announcements">
                <div class="collectives">
                    <div class="academics">
                        <?php echo "<a href='academics.php?uname=$uname'><img src='media\images\laboratory.jpg' height='200px' width='250px' style='border: 5px dashed grey; border-radius: 10px;'></a>";?>
                    </div>
                    <div class="announcements-words">
                        <span><b>Academics</b></span>
                    </div>
                </div>
                <div class="collectives">
                    <div class="sports">
                        <?php echo "<a href='sports.php?uname=$uname'><img src='media\images\sports.jpg' height='200px' width='250px' style='border: 5px dotted grey; border-radius: 10px; '></a>";?>
                    </div>
                    <div class="announcements-words">
                        <span><b>Sports</b></span>
                    </div>
                </div>
                <div class="collectives">
                    <div class="events">
                        <?php echo "<a href='events.php?uname=$uname'><img src='media/images/event.jpg' height='200px' width='250px' style='border: 5px dashed grey; border-radius: 10px;'></a>";?>
                    </div>
                    <div class="announcements-words">
                        <span><b>Events</b></span>
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