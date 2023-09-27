<?php

function display_board($board)
{
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo " " . $board[$i][$j] . " ";
            if ($j < 2) {
                echo "|";
            }
        }
        echo "\n";
        if ($i < 2) {
            echo "---+---+---\n";
        }
    }
    echo "\n";
}

function check_winner($board, $player)
{
    // Check rows, columns, and diagonals for a win
    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player) {
            return true; // Row win
        }
        if ($board[0][$i] == $player && $board[1][$i] == $player && $board[2][$i] == $player) {
            return true; // Column win
        }
    }

    if ($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player) {
        return true; // Diagonal (\) win
    }

    if ($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player) {
        return true; // Diagonal (/) win
    }

    return false;
}

function is_full($board)
{
    // Check if the board is full
    foreach ($board as $row) {
        if (in_array(' ', $row)) {
            return false;
        }
    }
    return true;
}

function tic_tac_toe()
{
    $board = [
        [' ', ' ', ' '],
        [' ', ' ', ' '],
        [' ', ' ', ' ']
    ];

    $currentPlayer = 'X';

    echo "Let's play Tic-Tac-Toe!\n";
    display_board($board);

    while (true) {
        echo "'$currentPlayer', choose your location (row-column): ";
        $input = readline();
        list($row, $col) = explode('-', $input);

        if ($row < 0 || $row > 2 || $col < 0 || $col > 2 || $board[$row][$col] != ' ') {
            echo "Invalid move. Try again.\n";
            continue;
        }

        $board[$row][$col] = $currentPlayer;
        display_board($board);

        if (check_winner($board, $currentPlayer)) {
            echo "'$currentPlayer' wins!\n";
            break;
        } elseif (is_full($board)) {
            echo "The game is a tie.\n";
            break;
        }

        $currentPlayer = ($currentPlayer == 'X') ? 'O' : 'X';
    }
}

tic_tac_toe();