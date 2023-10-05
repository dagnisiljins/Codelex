<?php

class Date {
    private $month;
    private $day;
    private $year;

    public function __construct($month, $day, $year) {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function setMonth($month) {
        $this->month = $month;
    }

    public function getDay() {
        return $this->day;
    }

    public function setDay($day) {
        $this->day = $day;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function displayDate() {
        return $this->month . '/' . $this->day . '/' . $this->year;
    }
}

class DateTest {
    public static function main() {
        $date = new Date(10, 15, 2023);

        echo "Date: " . $date->displayDate() . PHP_EOL;

        $date->setMonth(8);
        $date->setDay(20);
        $date->setYear(2024);

        echo "Updated Date: " . $date->displayDate() . PHP_EOL;


    }
}

DateTest::main();

$date = new Date(12, 24, 2023);

$day = $date->getDay();
$month = $date->getMonth();
$year = $date->getYear();

echo 'Next update___________________________' . PHP_EOL;
echo 'Day is set to: ' . $day . PHP_EOL;
echo 'Month is set to: ' . $month . PHP_EOL;
echo 'Year is set to: ' . $year . PHP_EOL;



