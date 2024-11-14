<?php
    function pr ($input) {
        echo "<pre>";
        print_r($input);
        echo "</pre>";
    }
    // PHP Indexed Array
    $student = ["Ahsan Saqib", "26-Apr-2000", "ahsansaqib600@gmail.com"];    
    echo "<pre>";
    print_r($student);
    echo "</pre>";
    
    // PHP Associative Array
    $student = [
        "name" => "Ahsan Saqib",
        "dob" => "26-Apr-2000",
        "email" => "ahsansaqib600@gmail.com"
    ];

    echo "<p>" . $student["name"] . "</p>";
    echo "<p>" . $student["dob"] . "</p>";
    echo "<p>" . $student["email"] . "</p>";

    foreach($student as $key=>$value) {
        echo "<p>$key | $value</p>";
    }

    $student["dob"] = "1-Jan-1999";
    $student["salary"] = 125000;
    unset($student["dob"]);

    pr($student);

    // asort($student);
    // arsort($student);

    // ksort($student);
    krsort($student);  
    
    pr($student);

    // PHP Multidimensional Arrays
    $students = [
        [
            "name" => "Ahsan Saqib",
            "dob" => "26-Apr-2000",
            "email" => "ahsansaqib600@gmail.com"
        ],
        [
            "name" => "Ashar Parekh",
            "dob" => "05-Jun-2014",
            "email" => "asharparekh@gmail.com"
        ],
        [
            "name" => "Syeda Ansharah",
            "dob" => "11-Mar-2004",
            "email" => "syedaansharah11@gmail.com"
        ]

    ];

    pr($students);
?>