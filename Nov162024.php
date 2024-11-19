<?php
// Include a reference link for date and time format documentation
// https://www.php.net/manual/en/datetime.format.php

// Set the default timezone to Asia/Karachi
date_default_timezone_set("Asia/Karachi");

// Display the current date and time in the specified format
echo "<p>" . date('D d-m-Y h:i:sa') . "</p>"; // Format: Day, date-month-year hours:minutes:seconds (12-hour format with AM/PM)

// Display the current timezone
echo "<p>" . date_default_timezone_get() . "</p>";

// Create a timestamp for Murtaza's date of birth using mktime
$murtaza_dob = mktime(18, 35, 45, 7, 3, 1983); // Parameters: hour, minute, second, month, day, year

// Display the formatted date of birth
echo "<p>" . date('l, d F Y H:i:s:v', $murtaza_dob) . "</p>"; // Format: Full weekday, day month year hours:minutes:seconds:milliseconds

// Calculate the timestamp for tomorrow
$d = strtotime("tomorrow");

// Display tomorrow's date in a formatted manner
echo "<p>Tomorrow: " . date("l, d F Y", $d) . "</p>"; // Format: Full weekday, day month year

// Calculate the timestamp for yesterday
$d = strtotime("yesterday");

// Display yesterday's date in a formatted manner
echo "<p>Yesterday: " . date("l, d F Y", $d) . "</p>"; // Format: Full weekday, day month year

// Define Murtaza's date of birth as a string in 'day-month-year' format
$dob = '3-Jul-1983'; // String representation of the date of birth

// Convert the date of birth string into a DateTime object
$dateOfBirth = date_create($dob); // Creates a DateTime object from the string

// Get the current date as a DateTime object
$currentDate = date_create('today'); // Uses 'today' to create a DateTime object for the current date

// Calculate the difference between the current date and the date of birth
$interval = date_diff($dateOfBirth, $currentDate); // Returns the difference as a DateInterval object

// Display the difference in years, months, and days
echo "Years: " . $interval->y . " Years<br>"; // Outputs the years difference
echo "Months: " . $interval->m . " Months<br>"; // Outputs the months difference
echo "Days: " . $interval->d . " Days<br>"; // Outputs the days difference
?>
