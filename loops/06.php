<?php
/*
 * Write a console program in a class named AsciiFigure that draws a figure of the following form,
 * using for loops:
 *
 3 line:
    ////////\\\\\\\\
    ////********\\\\
    ****************
 */
class AsciiFigure {
   public static function drawFigure($size) {
        for ($i = 0; $i < $size; $i++) {
            // Draw left slashes
            for ($j = $size - 1; $j > $i; $j--) {
                echo "/";
            }

            // Draw asterisks
            for ($k = 0; $k < $i * 2; $k++) {
                echo "*";
            }

            // Draw right slashes
            for ($j = $size - 1; $j > $i; $j--) {
                echo "\\";
            }

            echo PHP_EOL; // Move to the next line
        }
    }
}

$size = intval(readline('Enter size: ')); //need to convert to integer, but work without as well
AsciiFigure::drawFigure($size);