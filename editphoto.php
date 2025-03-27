<?php
    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $news = $_GET['news'];

    $photoname = $_FILES['news']['tmp_name'];
    $photofile = $_FILES['news']['name'];

    $folder = "media/images/news/".$photofile;
    $photo = "media/images/news/".$photofile;

    move_uploaded_file($photoname, $folder);

    $query = "UPDATE news SET news_photo = '$photo' WHERE news_no = '$news'";
    $result = mysqli_query($db, $query);

    if($result){
        header("location:newsInfo.php?uname=$uname&&news=$news");
    }
    else{
        echo "Error while updating news!";
    }