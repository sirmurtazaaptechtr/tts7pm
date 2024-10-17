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

    // PHP Increment / Decrement Operators
    $x = 10;
    $y = 3;

    // $sum = ++$x + $y;// pre-inc
    $sum = $x++ + $y;// post-inc
    echo "<p>sum($x,$y) $sum</p>";

    // PHP Logical Operators
    echo "<p> true and true => ";
    var_dump(true && true);
    echo "</p>";

    echo "<p> true and false => ";
    var_dump(true && false);
    echo "</p>";

    echo "<p> false and true => ";
    var_dump(false && true);
    echo "</p>";

    echo "<p> false and false => ";
    var_dump(false && false);
    echo "</p>";

    echo "<p> true or true => ";
    var_dump(true || true);
    echo "</p>";

    echo "<p> true or false => ";
    var_dump(true || false);
    echo "</p>";

    echo "<p> false or true => ";
    var_dump(false || true);
    echo "</p>";

    echo "<p> false or false => ";
    var_dump(false || false);
    echo "</p>";

    // PHP String Operators

    $first_name = "Aptech";
    $last_name = "Learning";

    $full_name = $first_name . " " . $last_name;
    $name = "Mr./Mrs/Ms ";

    $name .= $full_name;
    echo "<p>$full_name</p>";
    echo "<p>$name</p>";

    // PHP Conditional Assignment Operators
    // Ternary

    $age = 21;

    $result = $age >= 18 ? "You can Drive" : "come after " . 18 - $age . "years";

    echo "<p>$result</p>";
    // Null coalescing

    // $data = null;
    $data = 12;

    $value = $data ?? "No Data";

    echo "<p>$value</p>";


?>
