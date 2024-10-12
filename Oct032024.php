<?php 
    $name = "Ashar Parekh";
    $name = "Hayan Ejaz";
    $age = 10;
    $age = 26;
    $gender = "male";

    echo $name,$age,$gender . "<br>";
    $v = print $name . "<br>";
    echo $v
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables and Datatypes</title>
</head>
<body>
    <h1>Welcome to Php - Variables</h1>
    <!-- method 1 - HTML inside Php -->
    <?php echo "<h2> Welcome $name </h2>";?> 

    <!-- method 2 - Php inside HTML -->
    <h2> Welcome <?php echo "$name";?> </h2> 
    
    <p>Hi, my name is <?php echo $name;?>. I am <?php echo $age;?>years old <?php echo $gender;?> </p>

    <?php
// Datatypes
        $str = "I Love Php";
        var_dump($str);
        echo "<br>";

        $i = 12;
        var_dump($i);
        echo "<br>";

        $f = 12.75;
        var_dump($f);
        echo "<br>";
        
        $b = true;
        var_dump($b);
        echo "<br>";
        
        $arr1 = ["Ahsan","Hussain","Junaid","Ashar"];
        var_dump($arr1);
        echo "<br>";
        
        $names = array("Ahsan","Hussain","Junaid","Ashar");
        echo "<pre>";
        print_r($names);
        echo "</pre>";

// String Functions
        $text = 'Aptech Learning';
        // Method 1
        $length = strlen($text);
        echo $length . "<br>";
        
        // Method 2
        echo strlen($text) . "<br>";
        
        echo str_word_count($text) . "<br>";

        // position of string start with 0
        echo strpos($text,"Learning");

        // $last = substr($text,7,8);
        $last = substr($text,7);
        $first = substr($text,0,5);
        echo "<p> $last, $first </p>";
        
    ?>


</body>
</html>