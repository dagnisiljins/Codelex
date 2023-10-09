<?php

class Account {
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $amount): void {
        $this->balance += $amount;
    }

    public function withdrawal(float $amount): void {
        $this->balance -= $amount;
    }

    public function balance(): float {
        return $this->balance;
    }

    public function __toString(): string {
        return "$this->name account, balance $this->balance";
    }
}

function transfer(Account $from, Account $to, float $howMuch): void {
    $from->withdrawal($howMuch);
    $to->deposit($howMuch);
}

//1
$AccountPersonA = new Account(readline('Enter persons A name: '), 0);
$AccountPersonA->deposit(readline('How much do you want to deposit: ')) . PHP_EOL;
echo $AccountPersonA . PHP_EOL;
echo '---------------------------------' . PHP_EOL;
//2
$AccountPersonB = new Account(readline('Enter persons B name: '), 0);
$AccountPersonB->deposit(readline('How much do you want to deposit: ')) . PHP_EOL;
echo $AccountPersonB . PHP_EOL;
echo '---------------------------------' . PHP_EOL;
//3
$AccountPersonC = new Account(readline('Enter persons C name: '), 0);
$AccountPersonC->deposit(readline('How much do you want to deposit: ')) . PHP_EOL;
echo $AccountPersonC . PHP_EOL;
echo '---------------------------------' . PHP_EOL;

echo 'Money withdraw example' . PHP_EOL;
echo $AccountPersonB . PHP_EOL;
$AccountPersonB->withdrawal(readline('How much money do you want to withdraw: ')) . PHP_EOL;
echo $AccountPersonB . ' after withdraw' . PHP_EOL;
echo '---------------------------------' . PHP_EOL;

echo 'Money transfer example' . PHP_EOL;
echo 'Account balance before transfer: ' . PHP_EOL;
echo $AccountPersonA . PHP_EOL;
echo $AccountPersonC . PHP_EOL;
echo PHP_EOL;

transfer($AccountPersonA, $AccountPersonC, readline('Enter transfer amount: ')) . PHP_EOL;
echo PHP_EOL;

echo 'Account balance after transfer: ' . PHP_EOL;
echo $AccountPersonA . PHP_EOL;
echo $AccountPersonC . PHP_EOL;
