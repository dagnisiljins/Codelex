<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showAccountInfo(): string
    {

        $formattedBalance = ($this->balance >= 0) ? '$' . number_format($this->balance, 2) : '-$' .
            number_format(abs($this->balance), 2);

        return $this->name . ', ' . $formattedBalance;
    }
}

$accounts = [
    new BankAccount('Dagnis', 17.25),
    new BankAccount('Janis', 1000.35),
    new BankAccount('Niks', -0.47)
    ];

foreach ($accounts as $account) {
    echo $account->showAccountInfo() . PHP_EOL;
}


