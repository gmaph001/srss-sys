<?php

    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];
    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                $query2 = "DELETE FROM admin WHERE userkey = '$id'";
                $result2 = mysqli_query($db, $query2);

                if($result2){
                    header("location:users.php?uname=$uname");
                }
                else{
                    echo "Error while revoking user!";
                }
            }
        }
    }
?>