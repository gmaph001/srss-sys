<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="results.css">
</head>
<body>
    <div class="tokeo">
    <?php

        require_once("config.php");

        $size = 0;
        $subject[$size];
        $notes[$size];
        $topic[$size];

        if(isset($_POST['input'])){

            // echo "Working";

            $input = strtoupper($_POST['input']);

            $query = "SELECT * FROM form2 WHERE subjectname LIKE '{$input}%' OR topic LIKE '{$input}%'";

            $result = mysqli_query($db,$query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $subject[$size] = $row['subjectname'];
                    $notes[$size] = $row['notes'];
                    $topic[$size] = $row['topic'];
                    $size++;
                }
            }


            if($size>0){
                for($i=$size-1; $i>=0; $i--){
                    echo "<p><a href='media/documents/$notes[$i]'>$subject[$i] <br> Topic: $topic[$i]</a></p>";
                    echo "<br>";
                }
            }
            else{
                echo "<p>No notes found!</p>";
            }

        }
    ?>
    </div>
</body>
</html>