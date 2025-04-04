<?php

    require "config.php";

    $uname = $_GET['uname'];
    $nothing = "out";

    $query1 = "SELECT * FROM admin";
    $query2 = "SELECT * FROM students";

    $result1 = mysqli_query($db, $query1);
    $result2 = mysqli_query($db, $query2);

    for($i=0; $i<mysqli_num_rows($result1); $i++){
        $row = mysqli_fetch_array($result1);

        if($uname === $row['userkey']){
            $query = "UPDATE admin SET security = '$nothing' WHERE userkey = '$uname'";
            $result = mysqli_query($db, $query);

            if($result){
                header("Location: index.php");
            }
            else{
                echo "Error while updating data!";
            }
        }
    }

    for($i=0; $i<mysqli_num_rows($result2); $i++){
        $row = mysqli_fetch_array($result2);

        if($uname === $row['userkey']){
            $query = "UPDATE students SET security = '$nothing' WHERE userkey = '$uname'";
            $result = mysqli_query($db, $query);

            if($result){
                header("Location: index.php");
            }
            else{
                echo "Error while updating data!";
            }
        }
    }