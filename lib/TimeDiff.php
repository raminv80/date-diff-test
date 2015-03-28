<?php
if(empty($default_time_zone)) {
  $default_time_zone='UTC';
}

class TimeDiff
{
  var $dateTime1_in_timezone;
  var $dateTime2_in_timezone;
  private $default_time_zone;

  function __construct($datetime_str_1, $datetime_str_2, $str_includes_time_zone=false, $default_time_zone='UTC', $timezone1=false, $timezone2=false) {
    $this->default_time_zone = $default_time_zone;
    $this->dateTime1_in_timezone = $this->datetime_in_timezone($datetime_str_1, $str_includes_time_zone, $timezone1);
    $this->dateTime2_in_timezone = $this->datetime_in_timezone($datetime_str_2, $str_includes_time_zone, $timezone2);
  }

  #if datetime_str includes a timezone make sure str_includes_time_zone is set to true
  #otherwise the timezone will be overridden.
  function datetime_in_timezone($datetime_str, $str_includes_time_zone=false, $timezone=false){
    if($str_includes_time_zone){
      if($timezone===false){
        return new DateTime($datetime_str);
      }else{
        $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : $this->default_time_zone);
        $datetime_in_timezone = new DateTime($datetime_str);
        $datetime_in_timezone->setTimeZone($userTimezone);
      }
    }else{
      $defaultTimezone = new DateTimeZone($this->default_time_zone);
      $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : $this->default_time_zone);
      $datetime_in_timezone = new DateTime($datetime_str, !empty($timezone) ? $userTimezone : $defaultTimezone);
      return $datetime_in_timezone;
    }
  }

  function get_interval(){  
    $interval = $this->dateTime1_in_timezone->diff($this->dateTime2_in_timezone);
    return $interval;
  }

  function days_in($convert_to=false){
    $interval = $this->get_interval();
    if($interval){
      $dif = $interval->days;
      switch($convert_to){
        case 'year':
          $dif /= 365;
        break;
        case 'hour':
          $dif *= 24;
        break;
        case 'minute':
          $dif *= 24*60;
        break;
        case 'second':
          $dif *= 24*60*60;
      }
      return $dif;
    }else return false;
  }

  function weeks_in($convert_to=false){
    $interval = $this->get_interval();
    if($interval){
      $dif = floor($interval->days / 7);
      switch($convert_to){
        case 'year':
          $dif *= 7/365;
        break;
        case 'hour':
          $dif *= 7*24;
        break;
        case 'minute':
          $dif *= 7*24*60;
        break;
        case 'second':
          $dif *= 7*24*60*60;
      }
      return $dif;
      
    }else return false;
  }

  function weekdays_in($convert_to=false){
    $interval = $this->get_interval();
    if($interval){
      $weeks_difference = floor($interval->days / 7);
      $first_day = date("w", $this->dateTime1_in_timezone->getTimeStamp());
      $days_remainder = floor($interval->days % 7);
      $odd_days = $first_day + $days_remainder;
      if ($odd_days > 7) { // Sunday
          $days_remainder--;
      }
      if ($odd_days > 6) { // Saturday
          $days_remainder--;
      }
      $dif = ($weeks_difference * 5) + $days_remainder;
      switch($convert_to){
        case 'year':
          $dif /= 365;
        break;
        case 'hour':
          $dif *= 24;
        break;
        case 'minute':
          $dif *= 24*60;
        break;
        case 'second':
          $dif *= 24*60*60;
      }
      return $dif;
    }else return false;
  }

}
?>