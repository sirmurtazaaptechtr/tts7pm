<?php
session_start();

$_SESSION["name"] = "Syed Murtaza Hussain";
$_SESSION["dob"] = "03-Dec-1984";
$_SESSION["gender"] = "male";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <form action="session.php">
        <input type="submit" value="Session">
    </form>
</body>
</html>