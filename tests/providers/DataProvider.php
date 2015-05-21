<?php
class DataProvider extends TestHelper{
  public function dateProvider(){
    return array(
        #from, to, days, weekdays, weeks
        array('2015-03-01', '2015-03-01', 0, 0, 0),
        array('2015-03-01', '2015-03-02', 1, 1, 0),
        array('2015-03-02', '2015-03-01', 1, 1, 0),
        array('2015-03-01', '2015-04-01', 31, 23, 4),
        array('2015-05-01', '2015-04-01', 30, 21, 4),
        array('2015-02-01', '2015-03-01', 28, 20, 4),
        array('2014-01-01', '2015-01-01', 365, 261, 52),
        array('2012-01-01', '2013-01-01', 366, 262, 52)
      );
  }

  public function dateTimeZoneProvider(){
    return array(
        array('2015-03-28', '2015-03-27', 'Australia/Sydney', 'America/Los_Angeles', 0, 0, 0),
        array('2015-03-01', '2015-03-02', 'Australia/Sydney', 'America/Los_Angeles', 1, 0, 0),
        array('2015-03-02', '2015-03-01', 'Australia/Sydney', 'America/Los_Angeles', 0, 0, 0),
        array('2015-03-01', '2015-04-01', 'Australia/Sydney', 'America/Los_Angeles', 31, 21, 4),
        array('2015-05-01', '2015-04-01', 'Australia/Sydney', 'America/Los_Angeles', 29, 21, 4),
        array('2015-02-01', '2015-03-01', 'Australia/Sydney', 'America/Los_Angeles', 28, 20, 4),
        array('2014-01-01', '2015-01-01', 'Australia/Sydney', 'America/Los_Angeles', 365, 261, 52),
        array('2012-01-01', '2013-01-01', 'Australia/Sydney', 'America/Los_Angeles', 366, 260, 52)
      );
  }

  public function dateTimeWithTextualTimeZoneProvider(){
    return array(
        array("10/Oct/2000:13:55:36 -0700", "10/Oct/2000:13:55:36 -0700", 0, 0, 0),
        array("10/Oct/2000:13:55:36 -0700", "11/Oct/2000:13:55:36 -0700", 1, 1, 0),
        array("10/Oct/2000:13:55:36 -0700", "11/Oct/2000:13:55:36 +0000", 0, 0, 0)
      );
  }

  public function dateTimeWithInvalidInputProvider(){
   return array(
        array("10/Oct/2000:13:55:36 -0700", "10/Oct/2000:13:55:36 -0700", 0),
        array("invalid", "11/Oct/2000:13:55:36 -0700", 1),
        array("10/Oct/2000:13:55:36 -0700", "invalid", 1),
        array("invalid", "invalid", 2)
      ); 
  }

}
?>