<?php
// Define a number to check if it's even or odd
$number = 14;

// Check if the number is even or odd
if($number % 2 == 0) {
    echo "<p>$number is Even</p>";
} else {
    echo "<p>$number is Odd</p>";
}

// Define student's information
$name = "Muhammad Hussain Nabeel"; // Student's name
$obtMarks = 775; // Obtained marks
$maxMarks = 850; // Maximum possible marks

// Calculate percentage and round to 2 decimal places
$percentage = round($obtMarks / $maxMarks * 100, 2);

// Display student's details
echo "<p>Name: $name</p>";
echo "<p>Marks: $obtMarks / $maxMarks</p>";
echo "<p>Percentage: $percentage%</p>";

// Determine pass/fail status
if($percentage >= 40) {
    echo "<p>Status: PASS</p>";
} else {
    echo "<p>Status: FAIL</p>";
}

// Determine the grade based on the percentage
if($percentage >= 80) {
    echo "<p>Grade: A+</p>";
} elseif($percentage >= 70) {
    echo "<p>Grade: A</p>";
} elseif($percentage >= 60) {
    echo "<p>Grade: B</p>";
} elseif($percentage >= 50) {
    echo "<p>Grade: C</p>";
} elseif($percentage >= 40) {
    echo "<p>Grade: D</p>";
} else {
    echo "<p>Grade: U</p>"; // Ungraded (fail)
}

// Define login credentials
$username = "aliraza";
$password = "123456";
$role = 'admin';

// Check username and password, then role
if($username == 'aliraza' && $password == '123456') {
    if($role == 'admin') {
        echo "<h1>Welcome Admin</h1>";
    } elseif($role == 'user') {
        echo "<h1>Welcome User</h1>";
    }
} else {
    // Invalid credentials message
    echo '<h4 style="color: red;">Invalid username or password!</h4>';
}
?>
