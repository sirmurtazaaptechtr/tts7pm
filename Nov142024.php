<?php
    // Define a helper function to print the array in a readable format
    function pr ($input) {
        echo "<pre>"; // Start of preformatted text for better readability
        print_r($input); // Print the array or object
        echo "</pre>"; // End of preformatted text
    }

    // PHP Indexed Array: An array with numeric indices
    $student = ["Ahsan Saqib", "26-Apr-2000", "ahsansaqib600@gmail.com"];    
    echo "<pre>";
    print_r($student); // Print the indexed array
    echo "</pre>";
    
    // PHP Associative Array: An array where each element is associated with a key (name => value)
    $student = [
        "name" => "Ahsan Saqib", // Key "name" points to the value "Ahsan Saqib"
        "dob" => "26-Apr-2000", // Key "dob" points to the value "26-Apr-2000"
        "email" => "ahsansaqib600@gmail.com" // Key "email" points to the value "ahsansaqib600@gmail.com"
    ];

    // Display individual elements of the associative array using their keys
    echo "<p>" . $student["name"] . "</p>";  // Display "Ahsan Saqib"
    echo "<p>" . $student["dob"] . "</p>";   // Display "26-Apr-2000"
    echo "<p>" . $student["email"] . "</p>"; // Display "ahsansaqib600@gmail.com"

    // Loop through the associative array and display key-value pairs
    foreach($student as $key=>$value) {
        echo "<p>$key | $value</p>";  // Display each key and corresponding value
    }

    // Modify the associative array: change value of "dob" and add a new key "salary"
    $student["dob"] = "1-Jan-1999";  // Update the "dob" key to a new date
    $student["salary"] = 125000;     // Add a new key "salary" with value 125000
    unset($student["dob"]);          // Remove the "dob" key from the array

    // Print the modified array using the helper function
    pr($student);

    // Uncomment the following lines to see how these functions affect the array:
    // asort($student); // Sort the array by values in ascending order
    // arsort($student); // Sort the array by values in descending order
    // ksort($student); // Sort the array by keys in ascending order
    krsort($student); // Sort the array by keys in descending order
    
    // Print the array after sorting by keys in descending order
    pr($student);

    // PHP Multidimensional Arrays: An array containing multiple arrays (arrays of arrays)
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

    // Print the multidimensional array (array of students) using the helper function
    pr($students);
?>
