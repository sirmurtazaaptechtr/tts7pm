<?php
require('connection.inc.php');
$emailErr = $passwordErr = '';
$email = $password = $user_id = $db_password = '';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signInBtn'])) {
    // pr($_POST);

    if(empty($_POST['email'])) {
        $emailErr = "Email is required!";
    }else {
        $email = test_input($_POST['email']);
    }

    if(empty($_POST['password'])) {
        $passwordErr = "Password is required!";
    }else {
        $password = test_input($_POST['password']);    
    }

    if(empty($emailErr) && empty($passwordErr)) {
        $students_sql = "SELECT * FROM `students` WHERE email = '$email'";
        $result = mysqli_query($conn,$students_sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // pr($row);
            $user_id = $row['id'];
            $login_sql = "SELECT * FROM `logins` WHERE user_id = '$user_id'";
            $result = mysqli_query($conn,$login_sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // pr($row);
                $db_password = $row['password'];
                if($password == $db_password) {
                    $message = "$email Login Successfull!";
                    $_SESSION['user_login'] = true;
                    $_SESSION['role_id'] = $row['role_id'];
                    header("Location:students.php?message=" . urlencode($message));
                    exit();
                }else {
                    $passwordErr = "Incorrect Password!";
                }
            }else {
                $passwordErr = "Access Denied!";
            }
        }else {
            $emailErr = "Incorrect Email!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center display-1 mb-5">Login - My App</h1>
        <div class="row">
            <div class="col-4 mx-auto">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>" />
                        <label class="form-label" for="email">Email address</label>
                        <span class="text-danger"><?php echo $emailErr;?></span>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" value="<?php echo $password;?>" />
                        <label class="form-label" for="password">Password</label>
                        <span class="text-danger"><?php echo $passwordErr;?></span>
                    </div>                  

                    <div class="row mb-4 px-3">                        
                        <!-- Submit button -->
                        <input type="submit" class="btn btn-primary btn-block mb-4" name="signInBtn" value="Sign in" />
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="addstudent.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>