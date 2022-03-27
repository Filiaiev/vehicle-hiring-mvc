<?php
function countHirePrice($startDate,$endDate,$dailyRate){
       $datetime1 = date_create($startDate);
	$datetime2 = date_create($endDate);
	// Calculates the difference between DateTime objects
	$interval = date_diff($datetime1, $datetime2);
       // if the date is the same, it means the vehicle is hired for 1 day
       if ($interval == 0) { $interval = 1;}
       $price = $dailyRate*$interval->format('%a');
       return $price;
 }
?>