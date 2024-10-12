<?php
$name = 'Ahmed Rajwani';
$age = 20;

echo "<P>Dear $name, you are $age years old</P>";
echo '<P>Dear $name, you are $age years old</P>';

$chars = strlen($name);
$words = str_word_count($name);

echo "<p>$name has $chars characters in it.</p>";
echo "<p>$name has $words word in it.</p>";

echo "<p>" . strpos($name,"Rajwani") . "</p>";
echo "<p>" . strtolower($name) . "</p>";
echo "<p>" . strtoupper($name) . "</p>";
echo "<p>" . str_replace('Rajwani','Raza',$name) . "</p>";

$text = "                       Ahmed                     Raza                   ";
echo "<p>" . trim($text) . "</p>";