<?php
    
    require "config.php";
    require "address.php";

    $uname = $_GET['uname'];

    if(isset($_POST['login'])){
        $otp = $_POST['pass'];

        echo $otp;

        $exist = false;

        $query = "SELECT * FROM seckeys";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)>0){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($otp === $row['OTP'] && $uname === $row['id']){
                    $exist = true;
                    break;
                }
            }
        }
        else{
            header("Location: account-admin.php?uname=$uname");
        }

        if($exist){
            $query2 = "UPDATE admin SET rank = '7', codename = 'PRGM' WHERE userkey = '$uname'";
            $result2 = mysqli_query($db, $query2);

            if($result2){
                header("Location: account-admin.php?uname=$uname");
            }
            else{
                echo "Error while updating data!";
            }
        }
        else{
            header("Location: account-admin.php?uname=$uname");
        }
    }
?>