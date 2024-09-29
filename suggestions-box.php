<?php
    require_once "config.php";

    $uname = $_GET['uname'];

    $query = "SELECT * FROM students";

    $result = mysqli_query($db, $query);


    if(isset($_POST['tuma'])){
        $privacy = $_POST['seen'];
        $suggestions = $_POST['suggestions'];

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);
                if($row['userkey'] === $uname){
                    $firstname = $row['firstname'];
                    $secondname = $row['secondname'];
                    $lastname = $row['lastname'];
                    $username = $row['username'];                   
                }
            }
        }

        if($privacy == NULL){
            $privacy = "private";
        }
        else{
            $privacy = "public";
        }

        $query2 = "INSERT INTO suggestions(user_ID, firstname, secondname, lastname, username, suggestions, privacy) VALUES('$uname', '$firstname', '$secondname', '$lastname', '$username', '$suggestions', '$privacy')";
        $result2 = mysqli_query($db, $query2);

        if($result2){
            echo "Thank You For Your Suggestions!";
        }
        else{
            echo "Sorry! Your suggestions are not submitted, due to the problem at our end!";
        }
    }