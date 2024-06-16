<?php

     $admin = file_get_contents('is_admin.txt');
     if($admin == "prf"){
          include 'failed.php';
     }
     else{
          include 'upload.html';
     }

