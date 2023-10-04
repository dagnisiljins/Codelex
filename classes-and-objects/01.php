<?php
/*
 * Create a class Product that represents a product sold in a shop. A product has a price, amount and name.

The class should have:

    A constructor Product  __construct(string name, float startPrice, int amount)
    A function printProduct() that prints a product in the following form:

Banana, price 1.1, amount 13

Test your code by creating a class with main method and add three products there:

    "Logitech mouse", 70.00 EUR, 14 units
    "iPhone 5s", 999.99 EUR, 3 units
    "Epson EB-U05", 440.46 EUR, 1 units

Print out information about them.

Add new behaviour to the Product class:

    possibility to change quantity
    possibility to change price

Reflect your changes in a working application.
 */
class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount) {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct() {
        return $this->name . ', price ' . $this->startPrice . ' EUR, amount ' . $this->amount . PHP_EOL;
    }

    public function setQuantity(int $newQuantity) {
        $this->amount = $newQuantity;
    }

    public function setStartPrice(float $newStartPrice) {
        $this->startPrice = $newStartPrice;
    }
}

$products = [];

$products[] = new Product("Logitech mouse", 70.00, 14);
$products[] = new Product("iPhone 5s", 999.99, 3);
$products[] = new Product("Epson EB-U05", 440.46, 1);

foreach ($products as $product) {
    echo $product->printProduct();
}

$products[0]->setStartPrice(65.00);
$products[0]->setQuantity(10);

echo $products[0]->printProduct();