<?php

    include "config.php";

    $security1 = false;
    $security2 = false;
    $uname = $_GET['uname'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    $query2 = "SELECT * FROM students";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($uname === $row['userkey']){
                if($ip === $row['security']){
                    $security2 = true;
                    break;
                }
            }
        }
    }

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($uname === $row['userkey']){
                if($ip === $row['security']){
                    $security1 = true;
                    break;
                }
            }
        }
    }

    if(!$security1 && !$security2){
        header("location:index.php");
    }