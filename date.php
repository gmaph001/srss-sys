<?php

$date = date_default_timezone_set('Africa/Nairobi');
if($date){
     $year = Date('Y');
     $week = Date('W');
     $day = Date('d');
     $hour = Date('h');
     $min = Date('m');
     $sec = Date('s');

     $secs = ((((((($year*$week*7)+$day)*24)+$hour)*60)+$min)*60)+$sec;
     echo $secs;
     echo "<br>";
     echo $day;
     echo "<br>";
     echo $week;
     echo "<br>";
     echo $year;
}