<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require_once "config.php";

        $uname = $_GET['uname'];

        $query = "SELECT * FROM suggestions";
        $result = mysqli_query($db, $query);

        $size = 0;
        $firstname[$size];
        $secondname[$size];
        $lastname[$size];
        $username[$size];
        $suggestions[$size];

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);
                
                $firstname[$size] = $row['firstname'];
                $secondname[$size] = $row['secondname'];
                $lastname[$size] = $row['lastname'];
                $suggestions[$size] = $row['suggestions'];
                if($row['privacy'] === "private"){
                    $username[$size] = $row['user_ID'];
                }
                else{
                    $username[$size] = $row['username'];
                }
                $size++;
                
            }
        }

        for($i=$size-1; $i>=0; $i--){
            echo 
                "
                    <p>User: $username[$i]</p>
                    <p>$suggestions[$i]</p>
                ";
        }
    ?>
</body>
</html>