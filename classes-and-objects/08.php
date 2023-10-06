<?php

class SavingsAccount {
    private float $annualInterestRate;
    private float $balance;

    public function __construct(float $balance, float $annualInterestRate) {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function withdraw(float $amount) {
        $this->balance -= $amount;
    }

    public function deposit(float $amount) {
        $this->balance += $amount;
    }

    public function calculateMonthlyInterest() {
        $monthlyInterestRate = $this->annualInterestRate / 12 / 100;
        $this->balance += $this->balance * $monthlyInterestRate;
    }

    public function getBalance() {
        return $this->balance;
    }
}

class ExtendedSavingsAccount extends SavingsAccount {
    public function calculateTotalDeposits(array $deposits) {
        return array_sum($deposits);
    }

    public function calculateTotalWithdrawals(array $withdrawals) {
        return array_sum($withdrawals);
    }
}


$initialBalance = floatval(readline("How much money is in the account?: "));
$annualInterestRate = floatval(readline("Enter the annual interest rate: "));
$months = intval(readline("How long has the account been opened? "));

$savingsAccount = new ExtendedSavingsAccount($initialBalance, $annualInterestRate);

$deposits = [];
$withdrawals = [];

for ($i = 1; $i <= $months; $i++) {
    $deposit = floatval(readline("Enter amount deposited for month $i: "));
    $savingsAccount->deposit($deposit);
    $deposits[] = $deposit;

    $withdrawal = floatval(readline("Enter amount withdrawn for month $i: "));
    $savingsAccount->withdraw($withdrawal);
    $withdrawals[] = $withdrawal;

    $savingsAccount->calculateMonthlyInterest();
}

$totalDeposits = $savingsAccount->calculateTotalDeposits($deposits);
$totalWithdrawals = $savingsAccount->calculateTotalWithdrawals($withdrawals);

$totalInterest = $savingsAccount->getBalance() - $initialBalance - $totalWithdrawals + $totalDeposits;

echo "Total deposited: $" . number_format($totalDeposits, 2) . PHP_EOL;
echo "Total withdrawn: $" . number_format($totalWithdrawals, 2) . PHP_EOL;
echo "Interest earned: $" . number_format($totalInterest, 2) . PHP_EOL;
echo "Ending balance: $" . number_format($savingsAccount->getBalance(), 2) . PHP_EOL;

