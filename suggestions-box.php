<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Suggestion | SUCCESS</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
    <div class="register">
        <?php
            error_reporting(E_ALL);

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
                            $user_ID = $row['userkey'];
                        }
                    }
                }

                if($privacy == NULL){
                    $privacy = "private";
                }
                else{
                    $privacy = "public";
                }
            }

            $sql = "INSERT INTO suggestions (user_ID, firstname, secondname, lastname, username, suggestions, privacy) VALUES (?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result2 = $stmtinsert->execute([$user_ID, $firstname, $secondname, $lastname, $username, $suggestions, $privacy]);

            if ($result2) {
                echo "<p>Thank You For Your Suggestions!</p><br>";
                echo "<p>You can now continue posting more suggestions! <a href=suggest.php?uname=$uname>Continue</a></p>";
            }
            else{
                echo "<p>Sorry! Suggestion failed to be submitted due to an error at our end!</p><br>";
                echo "<p>Please contact the developer! <a href=home.php?uname=$uname&&#footer>Continue</a></p>";
            }
        ?>
    </div>
</body>
</html>