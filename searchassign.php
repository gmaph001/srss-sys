<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="results.css">
    <title>Assignments Search</title>
</head>
<body>
    <div class="tokeo">
    <?php
        require_once("config.php");

        $size = 0;
        $id = [];
        $assignment = [];
        $subject = [];

        if(isset($_POST['input'])){
            $input = strtoupper($_POST['input']);

            $query = "SELECT * FROM assignments WHERE assign_ID LIKE '{$input}%' OR subject LIKE '{$input}%' OR teacher LIKE '{$input}%'";
            $result = mysqli_query($db, $query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $subject[$size] = $row['subject'];
                    $id[$size] = $row['assign_ID'];
                    $assignment[$size] = $row['assignment'];
                    $size++;
                }
            }

            if($size > 0){
                for($i = $size - 1; $i >= 0; $i--){
                    echo "<p><a href='{$assignment[$i]}'>{$subject[$i]} <br> Assignment ID: {$id[$i]}</a></p><br>";
                }
            } else {
                echo "<p>No assignments found!</p>";
            }
        }
    ?>
    </div>
</body>
</html>
