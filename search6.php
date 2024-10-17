<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

        require_once("config.php");

        if(isset($_POST['input'])){

            // echo "Working";

            $input = strtoupper($_POST['input']);

            $query = "SELECT * FROM form6 WHERE subjectname LIKE '{$input}%'";

            $result = mysqli_query($db,$query);

            if(mysqli_num_rows($result)> 0){
                $row = mysqli_fetch_array($result);

                for($i=0; $i<mysqli_num_rows($result); $i++){
                    $subject = $row['subjectname'];
                    $notes = $row['notes'];
                    $topic = $row['topic'];

                    echo "<a href='media/documents/$notes'>$subject</a>";
                    echo "<br><br>";
                }
            }
            else{
                echo "No data found";
            }

        }
    ?>
</body>
</html>