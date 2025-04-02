<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="userresults.css">
</head>
<body>
    <?php

        require_once("config.php");

        $uname = $_GET['uname'];

        $id = [];
        $username = [];
        $email = [];
        $photo = [];
        $class = [];
        $stream = [];
        $rank = [];
        $key = [];
        $size = 0;

        if(isset($_POST['input'])){

            $input = $_POST['input'];

            $query = "SELECT * FROM students WHERE username LIKE '{$input}%'";

            $result = mysqli_query($db, $query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $username[$size] = $row['username'];
                    $email[$size] = $row['email'];
                    $photo[$size] = $row['photo'];
                    $class[$size] = $row['form'];
                    $stream[$size] = $row['stream'];
                    $key[$size] = $row['userkey'];
                    $size++;
                }
            }


            if($size>0){
                for($j=$size-1; $j>=0; $j--){
                    echo "
                              <div class='account'>
                                   <img src='$photo[$j]' class='prof_pic'>
                                   <div class='profile'>
                                        <p>USERNAME: <span class='detail'>$username[$j]</span></p><br>
                                        <p>EMAIL: <span class='detail'>$email[$j]</span></p><br>
                                        <p>FORM: <span class='detail'>$class[$j]</span></p><br>
                                        <p>STREAM: <span class='detail'>$stream[$j]</span></p><br>
                              ";

                         $exist = false;
                         $dev = false;

                         $chkquery = "SELECT * FROM admin";
                         $chkres = mysqli_query($db, $chkquery);

                         for($i=0; $i<mysqli_num_rows($chkres); $i++){
                              $row = mysqli_fetch_array($chkres);

                              if($key[$j] === $row['userkey']){
                                   $exist = true;
                                   if($row['rank'] === "7"){
                                        $dev = true;
                                   }
                                   break;
                              }
                         }

                         if($exist){
                              if($dev){
                                   echo "
                                             <p>RANK: <span class='detail'>DEVELOPER</span></p>
                                        </div>
                                             <div class='btns'>
                                                  <a href='revoke.php?uname=$uname&&id=$key[$j]' class='revoke'>Revoke</a>
                                             </div>
                                        </div>
                                        ";
                              }
                              else{
                                   echo "
                                             <p>RANK: <span class='detail'>PREFECT</span></p>
                                        </div>
                                             <div class='btns'>
                                                  <a href='revoke.php?uname=$uname&&id=$key[$j]' class='revoke'>Revoke</a>
                                             </div>
                                        </div>
                                        ";
                              }
                         }
                         else{
                              echo "
                                        <p>RANK: <span class='detail'>COMMON</span></p>
                                   </div>
                                        <div class='btns'>
                                             <a href='approve.php?uname=$uname&&id=$key[$j]' class='approve'>Invoke</a>
                                        </div>
                                   </div>
                                   ";
                         }
                }
            }
            else{
                echo    
                    "
                        <div class='noresult'>
                            <p>No User Found!</p>
                        </div>
                    ";
            }

        }
    ?>
</body>
</html>