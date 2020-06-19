<?php

namespace App\Http\Services;
use DateTime;

class DateConverter {
    private $dates;
    function __construct() {
      $this->dates = array();
    }
    public function setDates($startTime, $endTime) {
        $day = 86400;
        $format = 'm/d/Y';
        $startTime = strtotime($startTime);
        $endTime = strtotime($endTime);
        $numDays = round(($endTime - $startTime) / $day); // remove increment

        // $days = array();

        for ($i = 0; $i < $numDays; $i++) { //change $i to 1
            $this->dates[] = date($format, ($startTime + ($i * $day)));
        }
        //
        // return $days;
    }
    public function getDates(){
      return $this->dates;
    }
}
