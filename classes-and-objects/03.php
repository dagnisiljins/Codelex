<?php
class FuelGauge
{
    private $fuel;
    private $messageDisplayed;

    public function __construct() {
        $this->fuel = 0;
        $this->messageDisplayed = false;
    }

    public function getFuel() {
        return $this->fuel;
    }

    public function incrementFuel() {
        if ($this->fuel < 70) {
            $this->fuel++;
        } elseif (!$this->messageDisplayed) {
            echo "The tank is already full. Fuel cannot exceed 70 liters." . PHP_EOL;
            $this->messageDisplayed = true;
            exit;
        }

    }

    public function decrementFuel() {
        if ($this->fuel > 0) {
            $this->fuel--;
        }
    }
}

class Odometer
{
    private $mileage;
    private $fuelGauge;

    public function __construct(FuelGauge $fuelGauge)
    {
        $this->mileage = 0;
        $this->fuelGauge = $fuelGauge;
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function incrementMileage()
    {
        $this->mileage++;

        if ($this->mileage > 999999) {
            $this->mileage = 0;
        }

        if ($this->mileage % 10 ==0) {
            $this->fuelGauge->decrementFuel();
        }
    }

}

$fuelGauge = new FuelGauge();
$odometer = new Odometer($fuelGauge);
$fuelInTank = readline('Fill the tank(max 70 l): ');

while ($fuelGauge->getFuel() < $fuelInTank) {
    $fuelGauge->incrementFuel();
}

while ($fuelGauge->getFuel() > 0) {
    $odometer->incrementMileage();

    echo 'Mileage: ' . $odometer->getMileage() . ' km' . PHP_EOL;
    echo 'Fuel: ' . $fuelGauge->getFuel() . ' liters' . PHP_EOL;
    echo '_________________________________________' . PHP_EOL;
}

