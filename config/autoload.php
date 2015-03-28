<?php
include 'config/settings.php';
include 'lib/TimeDiff.php';

function __autoload($className) { 
  echo "AutoLoading {$className}";
  if (file_exists($className . '.php')) { 
    require_once $className . '.php'; 
    return true; 
  } 
  return false; 
} 

function canClassBeAutloaded($className) { 
      return class_exists($className); 
}
?>