<?php
include 'config/autoload.php';

$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
$show_result = false;

if(!empty($_REQUEST['date-from']) && !empty($_REQUEST['date-to'])){
  $date_from = $_REQUEST['date-from'];
  $date_to = $_REQUEST['date-to'];
  $timezone1 = $_REQUEST['from-timezone'];
  $timezone2 = $_REQUEST['to-timezone'];
  $time_diff = new TimeDiff($date_from, $date_to, false, $default_time_zone, $timezone1, $timezone2);
  
  $diffs = array(
    "days" => array(
      "value" => $time_diff->days_in(),
      "to_year" => $time_diff->days_in("year"),
      "to_hour" => $time_diff->days_in("hour"),
      "to_minute" => $time_diff->days_in("minute"),
      "to_second" => $time_diff->days_in("second")
    ),
    "weeks" => array(
      "value" => $time_diff->weeks_in(),
      "to_year" => $time_diff->weeks_in("year"),
      "to_hour" => $time_diff->weeks_in("hour"),
      "to_minute" => $time_diff->weeks_in("minute"),
      "to_second" => $time_diff->weeks_in("second")
    ),
    "weekdays" => array(
      "value" => $time_diff->weekdays_in(),
      "to_year" => $time_diff->weekdays_in("year"),
      "to_hour" => $time_diff->weekdays_in("hour"),
      "to_minute" => $time_diff->weekdays_in("minute"),
      "to_second" => $time_diff->weekdays_in("second")
    )
  );
  $show_result = true;
}

function converted($dif){
  $str = "";
  $str .= round($dif['to_year'], 3);
  $str .= " year";
  if($dif['to_year']>1) $str.= "s";
  $str .= ", or {$dif['to_hour']} hour";
  if($dif['to_hour']>1) $str.= "s";
  $str .= ", or {$dif['to_minute']} minute";
  if($dif['to_minute']>1) $str.= "s";
  $str .= ", or {$dif['to_second']} second";
  if($dif['to_second']>1) $str.= "s";
  return $str;
}
?>