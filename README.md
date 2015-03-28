# date-diff Test
[![Circle CI](https://circleci.com/gh/raminv80/date-diff-test/tree/master.svg?style=svg)](https://circleci.com/gh/raminv80/date-diff-test/tree/master)

To view a live demo of this app visit [this link](http://ramin.koding.io/date-diff/).

## About the test
This is a respond to following coding challenge:

1. Find out the number of days between two date parameters.
 
2. Find out the number of weekdays between two date parameters.
 
3. Find out the number of complete weeks between two date parameters.
 
4. Accept a third parameter to convert the result of (1, 2 or 3) into one of seconds, minutes, hours, years.
 
5. Allow the inclusion of a timezone string for comparison of date parameters from different timezones.

##About the Demo
This repository consist of a demo for TimeDiff lib for calculation of weekdays, weeks and days between two dates. If you want to use the TimeDiff library for your project please copy the lib/TimeDiff.php to your project.

To install the demo download or clone this repository to your web server's folder and run index.php.

## Library Installation
download the code and copy lib/TimeDiff.php to you library project. Include it in your target script.

## How to use:
### Initialize the object
The library provides a TimeDiff class with methods to calculate the number of days, weekdays and complete weeks in between.

Initialize the class with your parameters. The constructor accepts following parameters:

```php
__construct(string $from=false, string $to=false [, boolean $str_includes_time_zone=false [, string $default_time_zone='UTC' [, $timezone_from=false, $timezone_to=false]]])
`
```
- $from sets the starting date string. It should be in a processable [format](http://php.net/manual/en/datetime.formats.php) by DateTime object. default is set to false*
- $to  sets the end date string. It should be in a processable [format](http://php.net/manual/en/datetime.formats.php) by DateTime object. default is set to false*
- $str_includes_time_zone determines if your $from or $to string are allowed to include timezone as part of their string. Default is set to false.
- $default_time_zone defines the default timezone. If $str_includes_time_zone is not set to true and $timezone_from and $timezone_to are false it falls back to default timezone. Default is set to 'UTC';
- $timezone_from: a valid php Timezone for $from. Default is set to false meaning it should fall back to default timezone.
- $timezone_to: a valid php Timezone for $to. Default is set to false meaning it should fall back to default timezone.

*You can initialize the constructor without any parameters. If so you will need to set date range with setters.

### Set date ranges
Use setFrom method to set the starting range.

```php
setFrom(string $datetime_str, boolean $str_includes_time_zone=false, string $timezone=false);
setTo(string $datetime_str, boolean $str_includes_time_zone=false, string $timezone=false);
```
- $datetime_str sets the starting date string. It should be in a processable [format](http://php.net/manual/en/datetime.formats.php) by DateTime object.
- $str_includes_time_zone determines if your $datetime_str  string are allowed to include timezone as part of their string. Deafult is set to false.
- $timezone: a valid php Timezone for $datetime_str. Default is set to false meaning it should fall back to default timezone.

### Retrieve results
By default results are returned as an integer number. You may pass a conversion option to them to convert the result to year, hours, minutes and seconds by passing the corresponding as a string ex: 'year'
.
#### Get number of days in the date range
```php
(int) days_in($convert_to=false)
```

#### Get number of week days in the date range
```php
(int) weekdays_in($convert_to=false)
```

#### Get number of weeks in the date range
```php
(int) weeks_in($convert_to=false)
```

