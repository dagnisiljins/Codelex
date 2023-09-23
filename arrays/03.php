<?php
//check if an array contains a value user entered

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$numberToSearch = readline('Please enter a number which you want to search: ');


if (array_search($numberToSearch, $numbers,)) {
        echo 'Number found';
    } else {
    echo 'Number not found';
}

