<?php
//Write a program that calculates and displays a person's body mass index (BMI). A person's BMI
// is calculated with the following formula: BMI = weight x 703 / height ^ 2. Where weight is
// measured in pounds and height is measured in inches. Display a message indicating whether
// the person has optimal weight, is underweight, or is overweight. A sedentary person's weight is
// considered optimal if his or her BMI is between 18.5 and 25. If the BMI is less than 18.5,
// the person is considered underweight. If the BMI value is greater than 25, the person is
// considered overweight.
//Your program must accept metric units.

function calculateBMI($weight, $height) {
    if ($weight <= 0 || $height <= 0) { //pārbaude, vai ievadītas derīgas vērtības
        return -1;
    }
    $bmi = $weight / ($height * $height);

    return $bmi;
}

function determineWeightCategory($bmi) {
    if ($bmi == -1) {
        return "Invalid input";
    } elseif ($bmi < 18.5) {
        return "Underweight";
    } elseif ($bmi >= 18.5 && $bmi <= 25) {
        return "Optimal weight";
    } else {
        return "Overweight";
    }
}

$weightKg = readline("Enter your weight in kilograms: ");
$heightMeters = readline("Enter your height in meters: ");

$bmi = calculateBMI($weightKg, $heightMeters);

$category = determineWeightCategory($bmi);

if ($category == "Invalid input") {
    echo "Invalid input. Please enter positive values for weight and height." . PHP_EOL;
} else {
    echo "Your BMI is: " . number_format($bmi, 2) . PHP_EOL;
    echo "Weight Category: " . $category . PHP_EOL;
}