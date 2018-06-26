<?php


$date1 = "2018-06-25 18:00:00";
$date2 = "2018-06-26 18:00:00";

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60)/ (60*60));
$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60)/ (60));
$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60 - $minutes*60));


echo $years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds;