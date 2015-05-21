<?php
#run the test manually from command line using:
#$> phpunit --bootstrap config/autoload.php test/timeDiffTest
include 'tests/TestHelper.php';
class TimeDiffTest extends dataProvider{
  protected function setUp()
  {
    //setup the test state
  }

  protected function tearDown()
  {
    //recover state from test
  }

  /**
   * @dataProvider dateProvider
   */
  public function testDaysInSameTimeZone($from, $to, $days, $weekdays, $weeks){
    $time_diff = new TimeDiff($from, $to);
    
    $this->assertEquals($days, $time_diff->days_in());
    $this->assertEquals($weekdays, $time_diff->weekdays_in());
    $this->assertEquals($weeks, $time_diff->weeks_in());

    $this->assertEquals($days/365, $time_diff->days_in('year'));
    $this->assertEquals($days*24, $time_diff->days_in('hour'));
    $this->assertEquals($days*24*60, $time_diff->days_in('minute'));
    $this->assertEquals($days*24*60*60, $time_diff->days_in('second'));

    $this->assertEquals($weekdays/365, $time_diff->weekdays_in('year'));
    $this->assertEquals($weekdays*24, $time_diff->weekdays_in('hour'));
    $this->assertEquals($weekdays*24*60, $time_diff->weekdays_in('minute'));
    $this->assertEquals($weekdays*24*60*60, $time_diff->weekdays_in('second'));

    $this->assertEquals($weeks*7/365, $time_diff->weeks_in('year'));
    $this->assertEquals($weeks*7*24, $time_diff->weeks_in('hour'));
    $this->assertEquals($weeks*7*24*60, $time_diff->weeks_in('minute'));
    $this->assertEquals($weeks*7*24*60*60, $time_diff->weeks_in('second'));
  }

  /**
   * @dataProvider dateTimeZoneProvider
   */
  public function testDaysInDifferentTimeZone($from, $to, $fromTimeZone, $toTimeZone, $days, $weekdays, $weeks){
    $time_diff = new TimeDiff($from, $to, false, 'UTC', $fromTimeZone, $toTimeZone);
    
    $this->assertEquals($days, $time_diff->days_in());
    $this->assertEquals($weekdays, $time_diff->weekdays_in());
    $this->assertEquals($weeks, $time_diff->weeks_in());
  }

  /**
   * @dataProvider dateTimeZoneProvider
   */
  public function testDaysInDifferentTimeZoneBySetters($from, $to, $fromTimeZone, $toTimeZone, $days, $weekdays, $weeks){
    $time_diff = new TimeDiff();
    $time_diff->setFrom($from, false, $fromTimeZone);
    $time_diff->setTo($to, false, $toTimeZone);
    
    $this->assertEquals($days, $time_diff->days_in());
    $this->assertEquals($weekdays, $time_diff->weekdays_in());
    $this->assertEquals($weeks, $time_diff->weeks_in());
  }

  /**
   * @dataProvider dateTimeWithTextualTimeZoneProvider
   */
  public function testDaysInDifferentTextualTimeZone($from, $to, $days, $weekdays, $weeks){
    $time_diff = new TimeDiff($from, $to, true);
    
    $this->assertEquals($days, $time_diff->days_in());
    $this->assertEquals($weekdays, $time_diff->weekdays_in());
    $this->assertEquals($weeks, $time_diff->weeks_in());
  }

  /**
   * @dataProvider dateTimeWithInvalidInputProvider
   */
  public function testInvalidInputsInConstructor($from, $to, $errors){
    $time_diff = new TimeDiff($from, $to, true);
    $this->assertEquals($errors, count($time_diff->get_errors()));
  }

  public function testInvalidInputsInSetter(){
    $time_diff = new TimeDiff('invalid', 'invalid');
    $this->assertEquals(2, count($time_diff->get_errors()));
    $time_diff->setFrom('2015-03-01');
    $this->assertEquals(1, count($time_diff->get_errors()));
    $time_diff->setTo('2015-03-02');
    $this->assertEquals(0, count($time_diff->get_errors()));
  }

}
?>