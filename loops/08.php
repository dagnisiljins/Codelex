<?php
/*
Write a console program in a class named NumberSquare that prompts the user for two integers,
a min and a max, and prints the numbers in the range from min to max inclusive in a square pattern.
Each line of the square consists of a wrapping sequence of integers increasing from min and max.
The first line begins with min, the second line begins with min + 1, and so on.
When the sequence in any line reaches max, it wraps around back to min. Y
ou may assume that min is less than or equal to max. Here is an example dialogue:

Min? 1
Max? 5
12345
23451
34512
45123
51234

 */

class NumberSquare {
    public static function generateSquare() {
        $min = intval(readline("Min? "));
        $max = intval(readline("Max? "));

        //We initialize two nested for loops
        for ($i = $min; $i <= $max; $i++) { //This loop controls the rows of the square
            for ($j = $i; $j <= $max; $j++) { //this loop prints first line from min to max and then decrisess
                //12345
                //2345
                //345
                //45
                //5

               echo $j;
            }

            for ($j = $min; $j < $i; $j++) { //second inner loop starts from min and goes up to
                // the current value of i. It prints numbers from min to one less than
                // the current row value, creating the wrap-around effect
                //1
                //12
                //123
                //1234
                echo $j;
            }

            echo "\n";//after each line we enter line break
        }
    }
}

NumberSquare::generateSquare();