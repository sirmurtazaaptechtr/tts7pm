<?php 
    // They would print "Welcome to Php" in paragraph tags multiple times
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    // echo "<p>Welcome to Php</p>";
    
    // Print a heading for the for loop section
    echo "<h2>FOR LOOP</h2>";
    // Initialize a for loop starting from 11 to 10 (which will not execute)
    for($i = 11; $i <= 10; $i++) {
        // This block won't execute since the condition is false
        echo "<p>$i. Welcome to Php</p>";
    }
    
    // Print a heading for the while loop section
    echo "<h2>While LOOP</h2>";
    $i = 11;
    // Initialize a while loop (also will not execute)
    while($i <= 10) {
        // This block won't execute since the condition is false
        echo "<p>$i. Welcome to Php</p>";
        $i++; // Increment the variable
    }
    
    // Print a heading for the do-while loop section
    echo "<h2>Do-While LOOP</h2>";
    
    $i = 11;
    // Execute the block at least once, but will not execute again due to the condition
    do {
        echo "<p>$i. Welcome to Php</p>";
        $i++; // Increment the variable
    } while($i <= 10); // The loop will stop after this since the condition is false
    
    // Initialize an array of names
    $names = ["Ashar", "Nazar", "Azib", "Ahmed", "Ahsan", "Hussain", "Junaid"];
    
    // They would print personalized messages for each name in the array
    // echo "<p>Dear $names[0], How do you do?</p>";
    // echo "<p>Dear $names[1], How do you do?</p>";
    // echo "<p>Dear $names[2], How do you do?</p>";
    // echo "<p>Dear $names[3], How do you do?</p>";
    // echo "<p>Dear $names[4], How do you do?</p>";
    // echo "<p>Dear $names[5], How do you do?</p>";
    // echo "<p>Dear $names[6], How do you do?</p>";
    
    // Print a heading for displaying the array using a for loop
    echo "<h2>Displaying Array with</h2>";
    echo "<h2>FOR</h2>";
    // Loop through the names array using a for loop
    for($i = 0; $i < count($names); $i++) {
        // Print a message for each name with its index (adjusting for human-friendly numbering)
        echo "<p>" . ($i + 1) . ". Dear $names[$i], How do you do?</p>";
    }
    
    // Print a heading for displaying the array using a foreach loop
    echo "<h2>FOREACH</h2>";
    $srno = 1; // Initialize a serial number
    // Loop through each name in the array
    foreach($names as $name) {
        // Print a message for each name with a serial number
        echo "<p>$srno. Dear $name, How do you do?</p>";
        $srno++; // Increment the serial number
    }

    // Loop to print odd numbers from 1 to 10
    for($cnt = 1; $cnt <= 10; $cnt++) {
        // Skip even numbers
        if($cnt % 2 == 0) {
            continue; // Skip to the next iteration if even
        }
        // Print the odd number
        echo "<p>$cnt</p>";
    }
    
?>
