<?php
    //Numbers
    // int - integers

    echo "<p>" . PHP_INT_MAX . "</p>";
    echo "<p>" . PHP_INT_MIN . "</p>";
    echo "<p>" . PHP_FLOAT_MAX . "</p>";
    echo "<p>" . PHP_FLOAT_MIN . "</p>";

    $a = 5; # int 
    $b = 5.34;##0
    $c = "25";
     

    var_dump($a);
    echo "<br>";

    var_dump($b);
    echo "<br>";

    var_dump($c);
    echo "<br>";

    var_dump(is_int($c));
    echo "<br>";
    var_dump(is_int($c));
    echo "<br>";
    var_dump(is_int($c));
    echo "<br>";
    
    $d = 1.24e419;
    var_dump($d);
    echo "<br>";
    
    $e = acos(8);
    var_dump($e);
    echo "<br>";
    
    $f = "3.14";
    var_dump(is_numeric($f));
    echo "<br>";

    // Cast float to int
    $float_number = 23465.768;
    // $int_number = (int)$float_number;// explicit casting float to int by cast operator
    // $int_number = (integer)$float_number;// explicit casting
    $int_number = intval($float_number);// explicit casting by intval() function
    echo $int_number;
    echo "<br>";
    
?>