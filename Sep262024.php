<?php
// All variables
$fullName = "Aptech Learning";
$number = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php 
    // Single line comment
    # Single line comment
    /* 
    Multi 
    line 
    comment 
    */
    echo "Hi There <br>";
    echo 2 /*+ 3*/ + 4 . "<br>";

    echo "I love $fullName!";
    ?>

    <h1><?php echo $fullName;?></h1>
    <?php EchO "<h1>$fullName</h1>";?>
</body>
</html>