<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg. Create a secondary array with
// shipping costs per weight. Meaning that you can say that over 10 kg shipping costs are 2 euros,
// otherwise its 1 euro. Using foreach loop print out the values of the fruits and how much it
// would cost to ship this product.


$fruits = [
    ["name" => "Apple", "weight" => 5],
    ["name" => "Banana", "weight" => 11],
    ["name" => "Orange", "weight" => 3],
    ["name" => "Grapes", "weight" => 20],
];


function calculateShippingCost($weight)
{
    if ($weight > 10) {
        return 2;
    } else {
        return 1;
    }
}


$shippingCosts = []; // Array where to store costs


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