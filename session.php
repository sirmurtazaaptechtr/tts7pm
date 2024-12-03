<?php
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <?php if(isset($_SESSION['name'])) { ?> 
    <form action="logout.php">
        <input type="submit" value="Logout">
    </form>
    <?php } else {?>
    <form action="Dec032024.php">
        <input type="submit" value="LogIn">        
    </form>
    <?php }?>
</body>
</html>