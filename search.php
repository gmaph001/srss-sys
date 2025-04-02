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
        $class = $_GET['class'];

        $size = 0;
        $subject = [];
        $notes = [];
        $topic = [];

        if(isset($_POST['input'])){

            $input = strtoupper($_POST['input']);

            $query = "SELECT * FROM notes WHERE subjectname LIKE '{$input}%' OR topic LIKE '{$input}%'";

            $result = mysqli_query($db, $query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    if($class === $row['class']){
                        $subject[$size] = $row['subjectname'];
                        $notes[$size] = $row['notes'];
                        $topic[$size] = $row['topic'];
                        $size++;
                    }
                }
            }


            if($size>0){
                for($i=$size-1; $i>=0; $i--){
                    echo "<p><a href='media/documents/notes/$notes[$i]'>$subject[$i] <br> Topic: $topic[$i]</a></p>";
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