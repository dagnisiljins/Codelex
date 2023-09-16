<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg. Create a secondary array with
// shipping costs per weight. Meaning that you can say that over 10 kg shipping costs are 2 euros,
// otherwise its 1 euro. Using foreach loop print out the values of the fruits and how much it
// would cost to ship this product.

// Create a 2D associative array of fruits and their weights.
$fruits = [
    ["name" => "Apple", "weight" => 5],
    ["name" => "Banana", "weight" => 11],
    ["name" => "Orange", "weight" => 3],
    ["name" => "Grapes", "weight" => 20],
];

// Function to determine the shipping cost based on weight
function calculateShippingCost($weight)
{
    if ($weight > 10) {
        return 2; // Shipping cost for weight over 10 kg is 2 euros
    } else {
        return 1; // Shipping cost for weight 10 kg or less is 1 euro
    }
}

// Create an array to store shipping costs for each fruit
$shippingCosts = [];

// Calculate and store shipping costs for each fruit
foreach ($fruits as $fruit) {
    $name = $fruit["name"];
    $weight = $fruit["weight"];
    $shippingCost = calculateShippingCost($weight);
    $shippingCosts[$name] = $shippingCost;
}

// Loop through the fruits and print out their names and shipping costs
foreach ($fruits as $fruit) {
    $name = $fruit["name"];
    $weight = $fruit["weight"];
    $shippingCost = $shippingCosts[$name];
    echo "Fruit: $name, Weight: $weight kg, Shipping Cost: $shippingCost euros" . PHP_EOL;
}