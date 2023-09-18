<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object) Person object
// has a name, valid licenses (multiple) & cash. Guns are objects stored within an array.
// Each gun has license letter, price & name. Using PHP in-built functions determine if the
// requester (person) can buy a gun from the store.

class Person
{
    public $name;
    public $licenses;
    public $cash;

    public function __construct($name, $licenses, $cash)
    {
        $this->name = $name;
        $this->licenses = $licenses;
        $this->cash = $cash;
    }

    public function canBuyGun($gun)
    {
        // Check if the person has the required license for the gun
        if (in_array($gun->license, $this->licenses)) {
            // Check if the person has enough cash to buy the gun
            if ($this->cash >= $gun->price) {
                return true;
            } else {
                return false;
            }
        } else {
            return false; // Person does not have the required license
        }
    }
}

class Gun
{
    public $name;
    public $license;
    public $price;

    public function __construct($name, $license, $price)
    {
        $this->name = $name;
        $this->license = $license;
        $this->price = $price;
    }
}

$licencetype = readline('What is your first licence type (A, B, C):');
$licencetypetwo = readline('What is your second licence type (A, B, C):');
$licencetypethree = readline('What is your third licence type (A, B, C):');

$cashonhand = readline('How much cash do you have with you: ');

// Create a person with licenses and cash
$person = new Person("John Doe", [$licencetype, $licencetypetwo, $licencetypethree], $cashonhand);

// Create an array of guns available in the store
$guns = [
    new Gun("Pistol", "A", 500),
    new Gun("Rifle", "B", 800),
    new Gun("Shotgun", "C", 600),
];

// Check if the person can buy each gun and display the result
foreach ($guns as $gun) {
    if ($person->canBuyGun($gun)) {
        echo $person->name . " can buy " . $gun->name . " for $" . $gun->price . PHP_EOL;
    } else {
        echo $person->name . " cannot buy " . $gun->name . PHP_EOL;
    }
}
