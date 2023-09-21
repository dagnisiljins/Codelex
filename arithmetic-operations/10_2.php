<?php



    // Function to calculate the area of a circle
    function calculateCircleArea($radius) {
        if ($radius < 0) {
            return "Error: Negative radius not allowed!";
        }
        return M_PI * $radius * $radius; //In place M_PI can use pi()
    }

    // Function to calculate the area of a rectangle
    function calculateRectangleArea($length, $width) {
        if ($length < 0 || $width < 0) {
            return "Error: Negative length or width not allowed!";
        }
        return $length * $width;
    }

    // Function to calculate the area of a triangle
    function calculateTriangleArea($base, $height) {
        if ($base < 0 || $height < 0) {
            return "Error: Negative base or height not allowed!";
        }
        return 0.5 * $base * $height;
    }


// Function to display the menu
function displayMenu() {
    echo "Geometry Calculator:" . PHP_EOL;
    echo "1. Calculate the Area of a Circle" . PHP_EOL;
    echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
    echo "3. Calculate the Area of a Triangle" . PHP_EOL;
    echo "4. Quit" . PHP_EOL;
    echo "Enter your choice (1-4): ";
}

// Main program
while (true) {
    displayMenu();
    $choice = readline();

    switch ($choice) {
        case 1:
            echo "Enter the radius of the circle: ";
            $radius = readline();
            echo "Area of the circle: " . calculateCircleArea($radius) . PHP_EOL;
            break;
        case 2:
            echo "Enter the length of the rectangle: ";
            $length = readline();
            echo "Enter the width of the rectangle: ";
            $width = readline();
            echo "Area of the rectangle: " . calculateRectangleArea($length, $width) . PHP_EOL;
            break;
        case 3:
            echo "Enter the base of the triangle: ";
            $base = readline();
            echo "Enter the height of the triangle: ";
            $height = readline();
            echo "Area of the triangle: " . calculateTriangleArea($base, $height) . PHP_EOL;
            break;
        case 4:
            echo "Goodbye!" . PHP_EOL;
            exit;
        default:
            echo "Invalid choice. Please enter a number between 1 and 4." . PHP_EOL;
    }
}


