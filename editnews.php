<?php

    require "config.php";

    $uname = $_GET['uname'];
    $news = $_GET['news'];

    $post = $_POST['news'];

    $query = "UPDATE news SET news_main = '$post' WHERE news_no = '$news'";
    $result = mysqli_query($db, $query);

    if($result){
        header("location:newsphotoedit.php?uname=$uname&&news=$news");
    }
    else{
        echo "Error while editing user!";
    }