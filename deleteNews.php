<?php
    require "config.php";

    $uname = $_GET['uname'];
    $news = $_GET['news'];

    $delquery = "DELETE FROM news WHERE news_no = '$news'";
    $delresult = mysqli_query($db, $delquery);

    if($delresult){
        header("location:news.php?uname=$uname");
    }
    else{
        echo "Error deleting news";
    }