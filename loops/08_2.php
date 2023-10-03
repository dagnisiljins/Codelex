<?php


class NumberFlip
{
    public static function flipTheNumbers() {
        $first = intval(readline('Enter first number from 0-9: '));
        $last = intval(readline('Enter last number from 0-9: '));

        for ($i = $first; $i <= $last; $i++) {
            for ($j = $i; $j <= $last; $j++) {
                echo $j;
            }
            for ($j = $first; $j < $i; $j++) { //first row skips, because $j=$first and as wel $i=$first, so $j = $i, but rule is $j<$i, in next rount $j<$i.
                echo $j;
            }
            echo PHP_EOL;
        }
    }
}

NumberFlip::flipTheNumbers();
