<?php

    require "config.php";

    $uname = $_GET['uname'];

    $query = "SELECT * FROM students";
    $result = mysqli_query($db, $query);

    if(isset($_POST['tuma'])){
        $privacy = $_POST['choice'];
        $suggestions = $_POST['suggestions'];

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result1);
                if($row['userkey'] === $uname){
                    $firstname = $row['firstname'];
                    $secondname = $row['secondname'];
                    $lastname = $row['lastname'];
                    $username = $row['username'];
                    $privacy = $row['privacy'];
                }
            }
        }
    }