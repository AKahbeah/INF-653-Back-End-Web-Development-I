<?php
// ======================
// Syntax and Variables Challenges
// ======================

// ======================
// Challenge 1: Displaying Information
// ======================
// Declare variables
$name = "John";
$age = 25;
$favorite_color = "blue";

// Display the sentence

echo "My name is $name, I am $age years old and my favorite color is $favorite_color.";

echo "<br><br>";

// ======================
// Challenge 2: Using Escape Characters
// ======================

// Sentence with escaped double quotes
echo "He said, \"PHP is fun!\" and left.";
echo "\n\n";

// Multi-line message using \n
echo "First line\nSecond line";

echo "<br><br>";

// ======================
// Challenge 3: Correcting Syntax Errors
// ======================

$greeting = 'Hello';   // Fixed quotes and semicolon
$age = 25;             // Define $age variable

echo "Welcome to the PHP world!<br>";
echo "Your age is " . $age;

echo "<br><br>";

// ======================
// Challenge 4: Fix Error
// ======================

echo "Welcome to PHP!";          // Added missing semicolon
$name = "John";                 // Added quotes around string 'John'
echo "Hello, $name";            // Use double quotes to interpolate $name

echo "<br><br>";

// ======================
// Challenge 5: Adding Comments to Code
// ======================

// Declare the original price of the item
$price = 50;

# Declare the discount amount to be subtracted
$discount = 10;

/*
 Calculate the final price by subtracting
 the discount from the original price
*/
$finalPrice = $price - $discount;

// Output the final total price with a dollar sign
echo "Total price: $" . $finalPrice;

echo "<br><br>";

// ======================
// Operators and If...else Challenges
// ======================

// ======================
// Challenge 1: 
// ======================

// Declare two numbers
$num1 = 10;
$num2 = 5;

// Perform operations
$addition = $num1 + $num2;
$subtraction = $num1 - $num2;
$multiplication = $num1 * $num2;
$division = $num1 / $num2;
$modulus = $num1 % $num2;

// Display the results
echo "Number 1: $num1\n";
echo "Number 2: $num2\n";
echo "Addition: $addition\n";
echo "Subtraction: $subtraction\n";
echo "Multiplication: $multiplication\n";
echo "Division: $division\n";
echo "Modulus: $modulus\n";

echo "<br><br>";

// ======================
// Challenge 2: 
// ======================

// Input integer
$number = 7;

// Check if the number is even or odd using modulus operator
if ($number % 2 == 0) {
    echo "$number is an even number";
} else {
    echo "$number is an odd number";
}

echo "<br><br>";


// ======================
// Challenge 3: 
// ======================

// Starting number
$number = 10;
echo "Starting number: $number<br>";

// Increment the number
$number++;
echo "After increment: $number<br>";

// Decrement the number
$number--;
echo "After decrement: $number";

echo "<br><br>";

// ======================
// Challenge 4: 
// ======================

// Input marks
$marks = 85;

// Determine grade based on marks
if ($marks >= 90) {
    $grade = "A";
} elseif ($marks >= 80) {
    $grade = "B";
} elseif ($marks >= 70) {
    $grade = "C";
} elseif ($marks >= 60) {
    $grade = "D";
} else {
    $grade = "F";
}

// Display the grade
echo "You got a $grade!";

echo "<br><br>";

// ======================
// Challenge 5: 
// ======================

// Input year
$year = 2024;

// Check if the year is a leap year
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a leap year.";
} else {
    echo "$year is not a leap year.";
}
?>

