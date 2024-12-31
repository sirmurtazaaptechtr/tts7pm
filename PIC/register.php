<?php
require('connection.inc.php');
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $genderErr = $websiteErr = "";
$id = $name = $email = $password = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pr($_POST);
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
    } else {
        $password = test_input($_POST["password"]);        
        // check if e-mail address is well-formed
        if (!(strlen($password) >= 8)) {
            $passwordErr = "Invalid password! Password must be at least 8 characters long.";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if(empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($websiteErr)) {
        $inset_sql = "INSERT INTO `users` (name, email, password, website, comment, gender) VALUES ('$name', '$email', '$password', '$website', '$comment', '$gender')";

        if($is_inserted = mysqli_query($conn, $inset_sql)) {
            $id = mysqli_insert_id($conn);
            echo "user $id inserted successfully!";
            $id = $name = $email = $password = $gender = $comment = $website = "";            
        }
    }
}

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIC - Register</title>

    <!-- BootStrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>PHP Form Validation Example</h2>
        <p><span class="text-danger">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Name: <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="text-danger">* <?php echo $nameErr; ?></span>
            <br><br>
            E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="text-danger">* <?php echo $emailErr; ?></span>
            <br><br>            
            Password: <input type="password" name="password" value="<?php echo $password; ?>">
            <span class="text-danger">* <?php echo $passwordErr; ?></span>
            <br><br>
            Website: <input type="text" name="website" value="<?php echo $website; ?>">
            <span class="text-danger"><?php echo $websiteErr; ?></span>
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
            <br><br>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
            <span class="text-danger">* <?php echo $genderErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <!-- BootStrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>