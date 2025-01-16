<?php
function pr ($data) {
    echo "<pre>";
    echo print_r($data);
    echo "</pre>";
}
$hostname = "localhost";
$username = "root";
$password = "";
$database = "new_db";

$conn = mysqli_connect($hostname,$username,$password,$database);

if($conn) {
    echo "<p><b>$database</b> is connected successfully!</p>";
}