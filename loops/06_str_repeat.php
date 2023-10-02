<?php

class AsciiFigure
{
    public static function drawAsciiFigure($figureRows) {
        for ($i = 0; $i < $figureRows; $i++) {
            // Print leading '/'
            echo str_repeat('/', $figureRows - 1 - $i);

            // Print '*'
            echo str_repeat('*', $i * 2);

            // Print trailing '\'
            echo str_repeat('\\', $figureRows - 1 - $i);

            echo PHP_EOL;
        }
    }
}

$figureRows = (int)readline('Enter figure size in rows: ');
AsciiFigure::drawAsciiFigure($figureRows);