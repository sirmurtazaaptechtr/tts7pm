<?php
require('inc.connection.php');
$full_name = $email_address = $dob =  $phone = $gender = '';
pr($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $insert_student_sql = "INSERT INTO `students` (name,email,dob,phone,gender) VALUES ('$full_name','$email_address','$dob','$phone','$gender')";

    $is_inserted = mysqli_query($conn,$insert_student_sql);

    if($is_inserted){
        header('Location:students.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Add Student</h1>
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="email_address" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Others</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="reset" class="btn btn-warning" value="Clear">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>