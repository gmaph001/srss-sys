<?php
    require_once "config.php";
    require "address.php";

    $uname = $_GET['uname'];

    require "timer.php";

    $rank = 0;

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
    <title>SRSS | Home</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="all.css">
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
    <div class="background-image1">
        <div class="intro">
            <h2>About</h2>
            <p> Welcome to our Academic Resource Website
                This website is made for students and teachers in Tanzania.
                Here, you will find study materials, notes, past papers, and other useful resources to help with learning and teaching.
                Our goal is to make education easier and better for everyone.
            </p>
        </div>
    </div>
    <div class="footer">
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