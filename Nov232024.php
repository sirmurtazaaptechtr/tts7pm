<?php
// Read and output the contents of the file "abc.txt" directly.
$file = readfile("abc.txt");

// Output a horizontal rule for separation.
echo "<hr>";

// Open the file "abc.txt" in read mode ("r").
$myfile = fopen("abc.txt", "r");
// Read the entire contents of the file and output it. The filesize() function is used to determine the size of the file.
echo fread($myfile, filesize("abc.txt"));
// Close the file after reading to free up resources.
fclose($myfile);

// Output a horizontal rule for separation.
echo "<hr>";

// Open the file "breakfast_menu.xml" in read mode.
$myfile = fopen("breakfast_menu.xml", "r");
// Read and output the contents of the file.
echo fread($myfile, filesize("breakfast_menu.xml"));
// Close the file after reading.
fclose($myfile);

// Output another horizontal rule for separation.
echo "<hr>";

// Open the file "breakfast_menu.json" in read mode.
$myfile = fopen("breakfast_menu.json", "r");
// Read and output the contents of the file.
echo fread($myfile, filesize("breakfast_menu.json"));
// Close the file after reading.
fclose($myfile);

// Output another horizontal rule for separation.
echo "<hr>";

// Open the file "abc.txt" in read-only mode ("r").
$myfile = fopen("abc.txt", "r");

// Use a while loop to iterate through the file until the end-of-file (EOF) is reached.
// The feof() function checks if the file pointer has reached the end of the file.
while (!feof($myfile)) {
    // Read a single line from the file using fgets() and wrap it in paragraph tags <p>.
    // This outputs each line as a paragraph.
    echo "<p>" . fgets($myfile) . "</p>";
}

// Close the file after the loop to free up system resources.
fclose($myfile);

echo "<hr>";

$myfile = fopen("abc.txt", "r");
// Output one character until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile) . "<br>";
}
fclose($myfile);

// run the following code just once as it will keep on appending the message

// $myfile = fopen("abc.txt","a");
// $message = "This is a new line by Syed Murtaza Hussain";
// fwrite($myfile,$message);
// fclose($myfile);

echo "<hr>";

readfile("abc.txt");

?>
