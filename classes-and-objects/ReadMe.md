
Exercise #1

Create a class Product that represents a product sold in a shop. A product has a price, amount and name.

The class should have:

    A constructor Product  __construct(string name, float startPrice, int amount)
    A function printProduct() that prints a product in the following form:

Banana, price 1.1, amount 13

Test your code by creating a class with main method and add three products there:

    "Logitech mouse", 70.00 EUR, 14 units
    "iPhone 5s", 999.99 EUR, 3 units
    "Epson EB-U05", 440.46 EUR, 1 units

Print out information about them.

Add new behaviour to the Product class:

    possibility to change quantity
    possibility to change price

Reflect your changes in a working application.
Exercise #2

Write a method named swapPoints that accepts two Points as parameters and swaps their x/y values.

Consider the following example code that calls swapPoints:

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")";
echo "(" . $p2->x . ", " . $p2->y . ")";

The output produced from the above code should be:

(-3, 6)
(5, 2)

Exercise #3

For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge and odometer. The classes you will design are the following:

The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:

    To know the car’s current amount of fuel, in liters.
    To report the car’s current amount of fuel, in liters.
    To be able to increment the amount of fuel by 1 liter. This simulates putting fuel in the car. ( The car can hold a maximum of 70 liters.)
    To be able to decrement the amount of fuel by 1 liter, if the amount of fuel is greater than 0 liters. This simulates burning fuel as the car runs.

The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:

    To know the car’s current mileage.
    To report the car’s current mileage.
    To be able to increment the current mileage by 1 kilometer. The maximum mileage the odometer can store is 999,999 kilometer. When this amount is exceeded, the odometer resets the current mileage to 0.
    To be able to work with a FuelGauge object. It should decrease the FuelGauge object’s current amount of fuel by 1 liter for every 10 kilometers traveled. (The car’s fuel economy is 10 kilometers per liter.)

Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel, and then run a loop that increments the odometer until the car runs out of fuel. During each loop iteration, print the car’s current mileage and amount of fuel.

Exercise #4

TThe class Movie is started below. An instance of class Movie represents a film. This class has the following three class variables:
 
     title, which is a string representing the title of the movie
     studio, which is a string representing the studio that made the movie
     rating, which is a string representing the rating of the movie (i.e. PG13, R, etc)
 
     Write a constructor for the class Movie, which takes the title of the movie, studio, and rating as its arguments, and sets the respective class variables to these values.
     Write a method GetPG, which takes an array of base type Movie as its argument, and returns a new array of only those movies in the input array with a rating of "PG". You may assume the input array is full of Movie instances. The returned array may be empty.
     Write a piece of code that creates an instance of the class Movie:
         with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG13”;
         with the title “Glass”, the studio “Buena Vista International” and the rating “PG13”;
         with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.


Exercise #5

Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.

Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct. Provide a set and a get for each instance variable.

Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.

Write a test application named DateTest that demonstrates class Date capabilities.

Exercise #6

See energy-drinks.php

A soft drink company recently surveyed 12,467 of its customers and found that approximately 14 percent of those surveyed purchase one or more energy drinks per week. Of those customers who purchase energy drinks, approximately 64 percent of them prefer citrus flavored energy drinks.

Write a program that displays the following:

    The approximate number of customers in the survey who purchased one or more energy drinks per week
    The approximate number of customers in the survey who prefer citrus flavored energy drinks
