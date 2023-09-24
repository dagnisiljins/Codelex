<?php
//Game Slot Machine.
/*
Each element is worth certain amount of points, 1 point = 100 $.
Points per each element:
A = 1,
Z = 2,
X = 3,
Y = 4,

How to WIN?????
You can WIN if:
1) You have 4 identical elements in row. (Prize amount = Element points * 4 * 100);
2) You can get double of the points if you have identical first 3 elements in row
and element under fourth element in row, like in example below:
X X X O
O O O X
O O O O
(Prize amount = Element points * 4 * 2 * 100).

!! If you have a several winning combinations, then points are added together.

*/

// Define the maximum number of rows and columns
$maxRows = 3;
$maxColumns = 4;

// Define elements and their corresponding point values
$elements = [
    'A' => 1,
    'Z' => 2,
    'X' => 3,
    'Y' => 4,
];

// Function to create a random game board
function createRandomBoard(array $elements, int $maxRows, int $maxColumns)
{
    $board = [];
    for ($row = 0; $row < $maxRows; $row++) {
        $board[$row] = [];
        for ($column = 0; $column < $maxColumns; $column++) {
            // Generate a random element for each cell
            $randomElement = array_rand($elements);
            $board[$row][$column] = $randomElement;
        }
    }
    return $board;
}

// Function to display the game board
function displayBoard(array $board)
{
    foreach ($board as $row) {
        foreach ($row as $element) {
            echo '' . $element . ' ';
        }
        echo PHP_EOL;
    }
}

// Function to check for a winning combination in rows (horizontal)
function checkRows(array $board, array $elements)
{
    $sumOfPoints = 0; // Testam

    // Check for 3 identical elements in a row with 1 identical element below last element in row
    for ($row = 0; $row < count($board) - 1; $row++) {
        for ($column = 0; $column < count($board[$row]); $column++) {
            $element = $board[$row][$column];
            if (
                $column + 3 < count($board[$row]) && // This condition checks if it's possible to have four elements in a row without going beyond the edge of the row. It ensures that there are at least four columns remaining in the current row.
                $element === $board[$row][$column + 1] && // This condition checks if the current element is identical to the element immediately to its right (in the same row).
                $element === $board[$row][$column + 2] && // This condition checks if the current element is identical to the element two positions to its right (in the same row).
                //$element === $board[$row][$column + 3] &&
                $element === $board[$row + 1][$column + 3] //This condition checks if the current element is identical to the element directly below and 3 position to the right.
            ) {
                //return $elements[$element] * 4 * 2; // Points for 4 identical elements
                $sumOfPoints += $elements[$element] * 4 *2;
            }
        }
    }

    //$totalPoints = 0; // Initialize points
    foreach ($board as $row) {
        $rowString = implode('', $row);
        foreach ($elements as $element => $pointsPerElement) {
            $pattern = "/$element{4,}/"; // Checks if 4 elements in row is identical
            if (preg_match($pattern, $rowString)) {
                $sumOfPoints += $pointsPerElement * 4; //Points per element multiplied with elements count in row
            }
        }
    }

    return $sumOfPoints;
}

// Function to play a game
function playGame(array $elements, int $maxRows, int $maxColumns, int $startMoney)
{
    $board = createRandomBoard($elements, $maxRows, $maxColumns);
    displayBoard($board);

    $rowPoints = checkRows($board, $elements);
    // $totalPoints = $rowPoints;

    echo "Points for winning combination: $rowPoints" . PHP_EOL;

    // Deduct 1 point (equivalent to 100 currency units) for playing
    $startMoney -= 100;
    echo "Money balance: $startMoney" . PHP_EOL;

    if ($rowPoints > 0) {
        // If the player wins, add points to money balance
        $startMoney += $rowPoints * 100;
        echo "Congratulations! You won!" . PHP_EOL;
        echo "Money balance after winning: $startMoney" . PHP_EOL;
    }

    return $startMoney;
}

// Start the game
echo "Welcome to the game! Are you ready to lose all your money?" . PHP_EOL;
$startMoney = (int)readline('Enter how much money you have: ');

while (true) {
    echo "========================" . PHP_EOL;
    $startMoney = playGame($elements, $maxRows, $maxColumns, $startMoney);

    if ($startMoney < 100) {
        echo "You're broke!!! You don't have enough money to continue playing." . PHP_EOL;
        break;
    }

    $choice = strtoupper(readline("Press P to continue playing or Q to end the game: "));
    if ($choice === 'Q') {
        break;
    }
}

echo "Thank you for playing! Money balance: $startMoney" . PHP_EOL;