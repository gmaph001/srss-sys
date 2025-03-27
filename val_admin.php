
          <?php
               $admin = file_get_contents('is_admin.txt');
               if($admin){
                    require_once "config.php";
                    require "address.php";
                    $uname = $_GET['uname'];
                    include 'leaders.php?uname='.$uname;
               }
               else if($admin == "prf"){
                    include 'leaders.php';
               }
               else{
                    include 'failed.php';
               }

               
          ?>
     