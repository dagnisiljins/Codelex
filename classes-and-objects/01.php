<?php
// read me
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