<?php

class Dog {
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex, ?Dog $mother = null, ?Dog $father = null) {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string {
        if ($this->father !== null) {
            return $this->father->name;
        } else {
            return "Unknown";
        }
    }

    public function hasSameMotherAs(Dog $otherDog): bool {
        if ($this->mother !== null && $otherDog->mother !== null) {
            return $this->mother->name === $otherDog->mother->name;
        } else {
            return false;
        }
    }
}

$max = new Dog("Max", "male", new Dog("Lady", "female"), new Dog("Rocky", "male"));
$coco = new Dog("Coco", "female", new Dog("Molly", "female"), new Dog("Buster", "male"));
$rocky = new Dog("Rocky", "male", new Dog("Molly", "female"), new Dog("Sam", "male"));
$buster = new Dog("Buster", "male", new Dog("Lady", "female"), new Dog("Sparky", "male"));

echo $coco->fathersName() . PHP_EOL;
echo $buster->fathersName() . PHP_EOL;
echo $rocky->fathersName() . PHP_EOL;
echo $max->fathersName() . PHP_EOL;

echo $coco->hasSameMotherAs($max) ? "Yes" : "No" . PHP_EOL;
echo $coco->hasSameMotherAs($buster) ? "Yes" : "No";
