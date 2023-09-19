<?php
//Foo Corporation needs a program to calculate how much to pay their hourly employees. The US Department of Labor
// requires that employees get paid time and a half for any hours over 40 that they work in a single week. For example,
// if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay. The State of Massachusetts
// requires that hourly employees be paid at least $8.00 an hour. Foo Corp requires that an employee not work more than
// 60 hours in a week.
const MINIMUM_WAGE = 8.00; // Minimum wage per hour
const MAX_HOURS_PER_WEEK = 60;
const OVERTIME_THRESHOLD = 40;
const OVERTIME_RATE = 1.5;

// Function to calculate total pay or print an error
function calculateTotalPay($basePay, $hoursWorked) {

    // Check if base pay is less than the minimum wage
    if ($basePay < MINIMUM_WAGE) {
        $totalPay = MINIMUM_WAGE * $hoursWorked;
        echo "Error: Base pay is less than the minimum wage ($" . MINIMUM_WAGE . " per hour). 
        Total pay according to minimum rate: " . number_format($totalPay, 2) . PHP_EOL;
        return;
    }

    // Check if hours worked exceed the maximum weekly hours
    if ($hoursWorked > MAX_HOURS_PER_WEEK) {
        $totalPay = $basePay * $hoursWorked;
        echo "Error: Employee worked more than the maximum weekly hours (" . MAX_HOURS_PER_WEEK . " hours). 
        Total pay: " . number_format($totalPay, 2) . PHP_EOL;
        return;
    }

    // Calculate regular pay and overtime pay
    if ($hoursWorked <= OVERTIME_THRESHOLD) {
        $totalPay = $basePay * $hoursWorked;
    } else {
        $regularPay = $basePay * OVERTIME_THRESHOLD;
        $overtimeHours = $hoursWorked - OVERTIME_THRESHOLD;
        $overtimePay = $basePay * OVERTIME_RATE * $overtimeHours;
        $totalPay = $regularPay + $overtimePay;
    }

    echo "Total pay: $" . number_format($totalPay, 2) . PHP_EOL;
}

// Main method
echo "Employee 1:" . PHP_EOL;
calculateTotalPay(7.50, 35);

echo "Employee 2:" . PHP_EOL;
calculateTotalPay(8.20, 47);

echo "Employee 3:" . PHP_EOL;
calculateTotalPay(10.00, 73);