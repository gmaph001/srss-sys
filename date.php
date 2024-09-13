<?php

$date = date_default_timezone_set('Africa/Nairobi');
if($date){
     $year = Date('Y');
     $month = Date('M');
     $week = Date('W');
     $day = Date('d');
     $hour = Date('h');
     $min = Date('m');
     $sec = Date('s');

     $year+=4;

     $today = Date('Y-m-d');

     $tarehe = Date("$year-01-01");

     $day+=4;

     if($today === $tarehe){
          echo "Dates are equivalent<br>";
     }
     elseif($tarehe === $tarehe){
          echo "Ni sawa<br>";
     }
     else{
          echo "Haijafanikiwa<br>";
     }

     // $today = filter_var(value: $tarehe, filter: FILTER_SANITIZE_NUMBER_INT);

     echo $tarehe;
     
     echo "<br>";
     // echo $day;
     // echo "<br>";
     // echo $month;
     // echo "<br>";
     // echo $year;
     // echo "<br>";
     // echo $tarehe;
     // echo "<br>";

     // echo $today;



     
}

