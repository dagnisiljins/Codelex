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

class AsciiFigure
{
    public static function drawAsciiFigure($figureRows) {
        for ($i = 0; $i < $figureRows; $i++) {
            for ($j = $figureRows - 1; $j > $i; $j--) { //pirmā rindā izdrukātais / skaits ir vienāds ar līniju skaitu - 1
                echo '/';
            }
            for ($k = 0; $k < $i * 2; $k++) { //$i ir esošās rindas nummurs. pirmā rindā nevienu neizdrukā, pēc tam katrā rindā par vienu vairāk un reiz 2
                echo '*';
            }
            for ($j = $figureRows - 1; $j > $i; $j--) { //tāds pats nosacījums kā 1. for loop
                echo '\\';
            }

            echo PHP_EOL;
        }

    }

}

$figureRows = (readline('Enter figure size in rows: '));
AsciiFigure::drawAsciiFigure($figureRows);