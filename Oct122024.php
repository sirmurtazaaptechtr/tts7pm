<?php
// Assign a float value 3.14 to the variable $a
$a = 3.14;

// Type cast the float $a to an integer and assign it to variable $b
// The decimal part (.14) will be removed, so $b will be 3
$b = (int)$a;

// var_dump() outputs the data type and value of $a (float 3.14)
var_dump($a);
echo "<br>";

// var_dump() outputs the data type and value of $b (integer 3)
var_dump($b);
echo "<br>";

// Type cast $a (which is 3.14) to an integer, so $a becomes 3
$a = (int)$a;

// var_dump() outputs the updated data type and value of $a (integer 3)
var_dump($a);
echo "<br>";

// Assign a string value "25 Books" to the variable $data
$data = "25 Books";

// var_dump() outputs the data type and value of $data (string "25")
var_dump($data);
echo "<br>";

// Type casting $data to an integer
$data = (int)$data;
echo "<br>";

// var_dump() outputs the data type and value of $data (integer 25)
var_dump($data);

// Type casting $data to a float
$data = (float)$data;
echo "<br>";

// var_dump() outputs the data type and value of $data (float 25.0)
var_dump($data);

// Math operations

// Display the value of pi using the pi() function
echo "<p>" . pi() . "</p>";

// min() function returns the smallest value from the provided set (-200 in this case)
echo (min(0, 150, 30, 20, -8, -200) . "<br>");

// max() function returns the largest value from the provided set (150 in this case)
echo (max(0, 150, 30, 20, -8, -200) . "<br>");

// abs() function returns the absolute value of a number (-6.7 becomes 6.7)
echo (abs(-6.7)) . "<br>";

// sqrt() function returns the square root of 144 (result is 12)
echo (sqrt(144)) . "<br>";

// round() function rounds the number 0.60 to the nearest integer (rounds up to 1)
echo (round(0.60)) . "<br>";

// round() function rounds the number 0.49 to the nearest integer (rounds down to 0)
echo (round(0.49)) . "<br>";

// rand() function generates a random number between PHP's default minimum and maximum integer range
echo (rand()) . "<br>";

// rand() function generates a random number between 1 and 10
echo (rand(1, 10)) . "<br>";

// PHP Constants

// Declares a constant COMPANY_NAME with the value "Aptech Learning"
const COMPANY_NAME = "Aptech Learning";

// define() function creates a constant COMPANY_ADDRESS with the given value
define("COMPANY_ADDRESS", "435/C/2, PECHS Block 2 Commercial, Near Liberty Chowk, Tariq Road, Karachi.");

// Output the value of COMPANY_NAME inside an HTML paragraph tag with bold label "Company Name : "
echo "<p><b>Company Name : </b>" . COMPANY_NAME . "</p>";

// Output the value of COMPANY_ADDRESS inside an HTML paragraph tag with bold label "Company Address : "
echo "<p><b>Company Address : </b>" . COMPANY_ADDRESS . "</p>";
?>
