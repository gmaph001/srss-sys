<?php

    require_once "config.php";
    require "address.php";

    $uname = $_GET['uname'];

    $query = "SELECT * FROM seckeys";
    $query2 = "SELECT * FROM admin";

    $result = mysqli_query($db, $query);
    $result2 = mysqli_query($db, $query2);

    $size = 0;
    $username = [];
    $key = [];

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);
            
            $key[$size] = $row['OTP'];
            $username[$size] = $row['username'];
            $size++;
            
        }
    }

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($uname === $row['userkey']){
                $dp = $row['photo'];
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
    <link rel="stylesheet" href="suggestions.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navigation">
        <div class="pics">
            <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
            <?php echo "<li><a href='account-admin.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";?>
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
                    <li><?php echo "<a href='account.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a>";?></li>
                </ul>
            </div>
    </nav>
    <body>
        <div class="body">
            <div class="sub_menu">
                <ul>
                    <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
                    <li><a href="index.php"><b>login</b></a></li>
                </ul>
            </div>
            <div class="main">
                <?php 
                    for($i=$size-1;  $i>=0; $i--){
                        echo 
                            "
                                <div class='suggestions-area'>
                                    <div class='username'>
                                        User: $username[$i]
                                    </div>
                                    <div class='suggestion'>
                                        <p>$key[$i]</p>
                                    </div>
                                </div>
                            ";
                    }
                ?>
            </div>
        </div>
        <script>
            let multimenu = document.querySelector('.multi_menu');
            let submenu = document.querySelector('.sub_menu');

            multimenu.onclick = function(){
                submenu.classList.toggle('open');
            }
        </script>
        <script src="timer.js"></script>
</body>
</html>