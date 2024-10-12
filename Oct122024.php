<?php 
    // Assign a string value "25" to the variable $data
    $data = "25";

    // var_dump() outputs the data type and value of $data (string "25")
    var_dump($data);

    // Line break for better readability in the output
    echo "<br>";
    
    // Line break for better readability in the output
    echo "<br>";

    // Type casting $data to an integer
    $data = (int)$data;
    
    
    // var_dump() outputs the data type and value of $data (integer 25)
    var_dump($data);

    // Type casting $data to a float
    $data = (float)$data;
    
    // Line break for better readability in the output
    echo "<br>";
    
    // var_dump() outputs the data type and value of $data (float 25.0)
    var_dump($data);

    // Math operations

    // Display the value of pi using the pi() function
    echo "<p>" . pi() . "</p>"; 

    // min() function returns the smallest value from the provided set (-200 in this case)
    echo(min(0, 150, 30, 20, -8, -200) . "<br>");
    
    // max() function returns the largest value from the provided set (150 in this case)
    echo(max(0, 150, 30, 20, -8, -200) . "<br>");

    // abs() function returns the absolute value of a number (-6.7 becomes 6.7)
    echo(abs(-6.7)) . "<br>";

    // sqrt() function returns the square root of 144 (result is 12)
    echo(sqrt(144)) . "<br>";

    // round() function rounds the number 0.60 to the nearest integer (rounds up to 1)
    echo(round(0.60)) . "<br>";
    
    // round() function rounds the number 0.49 to the nearest integer (rounds down to 0)
    echo(round(0.49)) . "<br>";

    // rand() function generates a random number between PHP's default minimum and maximum integer range
    echo(rand()) . "<br>";

    // rand() function generates a random number between 1 and 10
    echo(rand(1, 10)) . "<br>";

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
