<?php
$name = "TheCookie";
$value = '{
        "breakfast_menu": {
        "food": [
            {
            "name": "Belgian Waffles",
            "price": "$5.95",
            "description": "Two of our famous Belgian Waffles with plenty of real maple syrup",
            "calories": 650
            },
            {
            "name": "Strawberry Belgian Waffles",
            "price": "$7.95",
            "description": "Light Belgian waffles covered with strawberries and whipped cream",
            "calories": 900
            },
            {
            "name": "Berry-Berry Belgian Waffles",
            "price": "$8.95",
            "description": "Light Belgian waffles covered with an assortment of fresh berries and whipped cream",
            "calories": 900
            },
            {
            "name": "French Toast",
            "price": "$4.50",
            "description": "Thick slices made from our homemade sourdough bread",
            "calories": 600
            },
            {
            "name": "Homestyle Breakfast",
            "price": "$6.95",
            "description": "Two eggs, bacon or sausage, toast, and our ever-popular hash browns",
            "calories": 950
            }
        ]
        }
    }';
$expire = time() + (86400 * 7);
$path = "/";

// setcookie
setcookie($name, $value, $expire, $path);

// getcookie
if (!isset($_COOKIE[$name])) {
    echo "<p>Cookie named '$name' is not set!</p>";
} else {
    echo "<p>Cookie '$name' is set!</p>";
    $JSONstring = $_COOKIE[$name];
    $arr = json_decode($JSONstring);
    // echo "<pre>";
    // print_r($arr->breakfast_menu->food);
    // echo "</pre>";
    $foods = $arr->breakfast_menu->food;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1>Hot and Spicy</h1>
    <div class="container">
        <h2>Breakfast Menu</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>srno.</th>
                    <th>name</th>
                    <th>calories</th>
                    <th>description</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $srno = 1;
                foreach ($foods as $food) {
                ?>
                    <tr>
                        <td><?php echo "$srno. "; ?></td>
                        <td><?php echo $food->name; ?></td>
                        <td><?php echo $food->calories; ?></td>
                        <td><?php echo $food->description; ?></td>
                        <td><?php echo $food->price; ?></td>
                    </tr>
                <?php
                    $srno++;
                }
                ?>
            </tbody>
        </table>

    </div>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>