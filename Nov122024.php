<?php 
    declare(strict_types=1);
    // function sum ($num1,$num2) {
    //     $sum = $num1+$num2;
    //     return $sum;
    // }    

    function sum (...$numbers) {
        $sum = 0;
        foreach($numbers as $number) {
            $sum += $number;
        }
        return $sum;        
    }

    function greetings (...$names) {
        foreach($names as $name) {
            echo "<p>Hello $name, have a nice day.</p>";
        }
    }

    function product (float $num1,float $num2) {
        return $num1 * $num2;
    }

    echo "<p>" . sum(12) . "</p>";
    echo "<p>" . sum(12,14) . "</p>";
    echo "<p>" . sum(12,14,16) . "</p>";

    greetings("Junaid");
    greetings("Junaid","Ashar","Nazar","Azib","Ahmed","Ahsan");

    echo "<p>" . product(15.6,20.7) ."</p>";
    // echo "<p>" . product("Ali",20.7) ."</p>";

    // PHP Arrays
    $names = array("Junaid","Ashar","Nazar","Azib","Ahmed","Ahsan");
    // OR
    $names = ["Junaid","Ashar","Nazar","Aazib","Ahmed","Ahsan"];

    echo "<pre>";
    print_r($names);
    echo "</pre>";

    echo "<p>" .$names[0] . "</p>";
    echo "<p>" .$names[3] . "</p>";
    
    for($i=0;$i<count($names);$i++ ) {
        echo "<p>Hi " .$names[$i] . "</p>";
    } 
    
    foreach($names as $name) {
        echo "<p>Hello $name</p>";
    }

    $student = ["name" => "Aazib","dob" => "22-May-2004","salary" => 175280];

    echo "<p>Name : " . $student["name"] . "</p>";
    echo "<p>Date of Birth : " . $student["dob"] . "</p>";
    echo "<p>Salary : " . $student["salary"] . "</p>";