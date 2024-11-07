<?php declare(strict_types=1);
// Variable Number of Arguments
function vari_fun (...$numbers) {
    $sum = 0;
    foreach($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

function product (float $num1, float $num2) {
    return $num1 * $num2;
}

function print_list ($list) {
    echo "<ul>";
        foreach($list as $l) {
            echo "<li>$l</li>";
        }
    echo "</ul>";
}

echo "<p>" . vari_fun(10) . "</p>";
echo "<p>" . vari_fun(10,20) . "</p>";
echo "<p>" . vari_fun(10,20,30,40,50,60) . "</p>";

echo "<p>" . product(5,6) . "</p>";
echo "<p>" . product(5.5,6.25) . "</p>";
// echo "<p>" . product("ali","raza") . "</p>";

// PHP Arrays - Indexed arrays

// Create Arrays
$cars = array("Volvo", "BMW", "Toyota");// by array function
// OR
$cars = ["Volvo", "BMW", "Toyota"];// by square brackets

// Update Arrays 
$cars[1] = "Honda"; 

// Access Arrays
echo "<p>" . $cars[0] . "</p>";
echo "<p>" . $cars[1] . "</p>";
echo "<p>" . $cars[2] . "</p>";
// OR
echo "<pre>";
    print_r($cars);
echo "</pre>";
// OR
echo "<ul>";
    foreach($cars as $car) {
        echo "<li>$car</li>";
    }
echo "</ul>";

// Add Array Items
array_push($cars, "Ford");// to push item in the last
print_list($cars);

array_unshift($cars,"GMC");// to add item at the start
print_list($cars);

// Remove Array Items
array_pop($cars);// to remove item in the last
print_list($cars);

array_shift($cars);// to remove item at the start
print_list($cars);