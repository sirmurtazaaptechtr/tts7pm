<?php
    // PHP Magic Constants
    // Output the current line number of the file
    echo "<p>" . __LINE__ . "</p>"; // This will output the line number where this code is written
    echo "<p>" . __LINE__ . "</p>"; // Outputs the next line number

    // Output the full path and filename of the file
    echo "<p>" . __FILE__ . "</p>"; // Displays the full path to the current file

    // Output the directory of the file
    echo "<p>" . __DIR__ . "</p>";  // Displays the directory path of the current file

    // PHP Operators
    // 1. Arithmetic operators: +, -, *, /, %, ** (exponentiation)

    // Initialize two variables with numeric values
    $num1 = 10;
    $num2 = 5;

    // Using addition operator
    echo "<p>$num1 + $num2 = " . $num1 + $num2 . "</p>"; // Incorrect string concatenation due to precedence, may result in unexpected output

    // OR (Correct version)
    // Store the result of addition in a variable and output the result
    $res = $num1 + $num2;
    echo "<p>$num1 + $num2 = $res</p>"; // Correctly outputs the sum of $num1 and $num2

    // Subtraction
    $res = $num1 - $num2;
    echo "<p>$num1 - $num2 = $res</p>"; // Outputs the result of $num1 minus $num2

    // Multiplication
    $res = $num1 * $num2;
    echo "<p>$num1 X $num2 = $res</p>"; // Outputs the result of $num1 multiplied by $num2

    // Division
    $res = $num1 / $num2;
    echo "<p>$num1 / $num2 = $res</p>"; // Outputs the result of $num1 divided by $num2

    // Modulus (remainder of division)
    $res = $num1 % $num2;
    echo "<p>$num1 % $num2 = $res</p>"; // Outputs the remainder when $num1 is divided by $num2

    // Exponentiation (power)
    $res = $num1 ** $num2;
    echo "<p>$num1 ^ $num2 = $res</p>"; // Outputs $num1 raised to the power of $num2 (10^5)

    // 2. PHP Assignment Operators & Arithmetic Assignment =, +=, -=, *=, %=

    $text = "This is my new text message...";

    $x = 5;
    echo "<p> $x </p>";
    
    $x += 5; # $x = $x + 5;
    echo "<p> $x </p>";
    
    $x -= 5; # $x = $x - 5;
    echo "<p> $x </p>";
    
    $x *= 5; # $x = $x * 5;
    echo "<p> $x </p>";
    
    $x /= 5; # $x = $x / 5;
    echo "<p> $x </p>";
    
    $x %= 5; # $x = $x % 5;
    echo "<p> $x </p>";

    // PHP Comparison Operators

    $a = 10;
    $b = "10";

    echo "<p> $a == $b => ";
    var_dump($a == $b);
    echo "</p>";
    echo "<p> $a === $b => ";
    var_dump($a === $b);
    echo "</p>";
    echo "<p> $a != $b => ";
    var_dump($a != $b);
    echo "</p>";
    echo "<p> $a !== $b => ";
    var_dump($a !== $b);
    echo "</p>";
    $b = 9;
    echo "<p> $a < $b => ";
    var_dump($a < $b);
    echo "</p>";
    echo "<p> $a > $b => ";
    var_dump($a > $b);
    echo "</p>";
    echo "<p> $a <=     $b => ";
    var_dump($a <= $b);
    echo "</p>";
    echo "<p> $a >= $b => ";
    var_dump($a >= $b);
    echo "</p>";
    echo "<p> $a <=> $b => ";
    echo $a <=> $b;
    echo "</p>";
    
    $b = 11;
    echo "<p> $a <=> $b => ";
    echo $a <=> $b;
    "</p>";
    
    $b = 10;
    echo "<p> $a <=> $b => ";
    echo $a <=> $b;
    "</p>";
?>
