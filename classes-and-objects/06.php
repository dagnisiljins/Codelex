<?php
// Šeit ir jāuztaisa klasē.


class Survey
{

    private $surveyed;
    private $purchased_energy_drinks;
    private $prefer_citrus_drinks;

    public function __construct($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function getSurveyData(){
        return [
            'surveyed' => $this->surveyed,
            'energyDrinks' => $this->purchased_energy_drinks,
            'citrusDrinks' => $this->prefer_citrus_drinks,
        ];
    }

    public function calculate_energy_drinkers()
    {
        if ($this->surveyed <= 0) {
            throw new LogicException('Number surveyed cannot be 0 or less!');
        }

        return (int) ($this->surveyed * $this->purchased_energy_drinks);
    }

    public function calculate_prefer_citrus()
    {
        if ($this->surveyed <= 0) {
            throw new LogicException('Number surveyed cannot be 0 or less!');
        }

        return (int) ($this->surveyed * $this->prefer_citrus_drinks);

    }
}

$data = new Survey(12467, 0.14, 0.64);

$energyDrinkers = $data->calculate_energy_drinkers();
$preferCitrus = $data->calculate_prefer_citrus();


try {
    echo "Total number of people surveyed " . $data->getSurveyData()['surveyed'] . PHP_EOL;
    echo "Approximately " . $energyDrinkers . " bought at least one energy drink." . PHP_EOL;
    echo $preferCitrus . " of those " . "prefer citrus flavored energy drinks.";
} catch (LogicException $x) { //cna use $e and other letters.
    echo "ERROR " . $x->getMessage() . PHP_EOL;
}
