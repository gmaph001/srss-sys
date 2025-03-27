<?php

    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $news = $_GET['news'];

    if(isset($_POST['submit'])){
        $post = $_POST['news'];

        $newspost = mysqli_real_escape_string($db, $post);

        $query = "UPDATE news SET news_main = '$newspost' WHERE news_no = '$news'";
        $result = mysqli_query($db, $query);

        if($result){
            header("location:newsphotoedit.php?uname=$uname&&news=$news");
        }
        else{
            echo "Error while editing user!";
        }
    }
?>