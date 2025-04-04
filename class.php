<?php

    require_once "config.php";
    require "address.php";
    
    $uname = $_GET['uname'];
    $class = $_GET['class'];

    require "timer.php";

    $query = "SELECT * FROM notes";
    $result = mysqli_query($db, $query);

    $size = 0;

    $notes[$size] = [];
    $id[$size] = [];
    $subjectname[$size] = [];
    $topic[$size] = [];
    $poster[$size] = [];


    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $rows = mysqli_fetch_array($result);

            if($class === $rows['class']){
                $id[$size] = $rows['notes_ID'];
                $notes[$size] = $rows['notes'];
                $subjectname[$size] = strtolower($rows['subjectname']);
                $topic[$size] = $rows['topic'];
                $poster[$size] = $rows['teachername'];
                $size++;
            }
        }
    }

    $uname = $_GET['uname'];
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
    <?php echo "<title>Form $class | Notes</title>";?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="subjects.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
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
                <div class="search">
                    <input type="text" class="searchbar" id="search" name="search" placeholder="Search Notes">
                </div>
                <div class="results" id="result">
                        <p></p>
                </div>
                <div class="row">
                    <?php
                        if($size>0){
                            for($i=$size-1; $i>=0; $i--){
                                echo "
                                    <div class='file'>
                                        <div class='$subjectname[$i]'>
                                            <a href='media/documents/notes/$notes[$i]' target='_blank' id='subject'>$subjectname[$i]</a>'
                                        </div>
                                        <div class='topic'>
                                            <p>TOPIC: </p>
                                            <p id='head'>$topic[$i].</p>
                                            <p>By $poster[$i]</p>
                                        </div>
                                    </div>";       
                            }
                        }
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
        <script src="jquery/jquery.js"></script>
        <script>
            $(document).ready(function(){

                $("#search").keyup(function(){

                    var input = $(this).val();
                    // alert(input);

                    if(input != ""){
                        $.ajax({
                            <?php echo "url: 'search.php?class=$class'";?>,
                            method: "POST",
                            data: {input:input},

                            success:function(data){
                                $("#result").html(data);
                                $("#result").css("display","block");
                            }
                        });
                    }
                    else{
                        $("#result").css("display","none");
                    }
                })
            })    
        </script>
    </div>
</body>
</html>