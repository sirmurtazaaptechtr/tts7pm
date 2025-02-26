<?php
ob_start(); // Start output buffering
session_start();
include('inc.functions.php');

$servername = "localhost";
$username = "root";
$password = "";
$database = "entertainment_website";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "$database Connected successfully";
?>

