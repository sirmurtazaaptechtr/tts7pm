<?php 
    $first_num = 1;
    $second_num = 10;

    // for($cnt = $first_num; $cnt <= $second_num; $cnt++) {
    //     echo "<p><strong>For $cnt : </strong><br>";
    //     for($dvr = 2; $dvr < $cnt; $dvr++) {
    //         echo "$dvr, ";
    //     }
    //     echo "</p>";
    // }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1><?php echo "Displaying PRIME & NOT-PRIME Between $first_num And $second_num";?></h1>
    <table class="table table-bordered table-dark table-striped">
        <thead>
            <tr>
                <th>Prime</th>
                <th>Not-Prime</th>
            </tr>
        </thead>
        <tbody>
            <?php           
            // Loop through numbers from $first_num to $second_num
            for($cnt = $first_num; $cnt <= $second_num; $cnt++) {
                $isPrime = true;
                
                echo "<tr>";                    
                // Check if the number is prime
                for($dvr = 2; $dvr < $cnt; $dvr++) {
                    if($cnt % $dvr == 0) {
                        $isPrime = false;
                        break;
                    }
                }
                // If the number is prime, display it in the Prime column
                if($isPrime) {                        
                    echo "<td>$cnt</td>";
                    echo "<td></td>";
                } else {
                    // If the number is not prime, display it in the Not-Prime column
                    echo "<td></td>";
                    echo "<td>$cnt</td>";
                }                        
                echo "</tr>";
            }   
            ?>
        </tbody>
    </table>
</body>
</html>

