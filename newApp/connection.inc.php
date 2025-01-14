<?php
ob_start();
session_start();
include('function.inc.php');
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "new_db";

if($conn = mysqli_connect($hostname,$username,$password,$database)) {
    echo "<p>$database connected successfully!</p>";
}