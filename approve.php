<?php

    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $id = $_GET['id'];

    $query = "SELECT * FROM students";
    $result = mysqli_query($db, $query);

    for($i=0; $i<mysqli_num_rows($result); $i++){
        $row = mysqli_fetch_array($result);

        if($id === $row['userkey']){
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $photo = $row['photo'];
        }
    }

    $rank = 6;
    $codename = "PRF";

    $query2 = "INSERT INTO admin(username, email, password, photo, rank, codename, userkey) VALUES('$username', '$email', '$password', '$photo', '$rank', '$codename', '$id')";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        header("Location: users.php?uname=$uname");
    }
    else{
        echo "Error while invoking a user!";
    }
?>