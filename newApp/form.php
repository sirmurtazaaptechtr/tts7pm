<?php
    require('connection.inc.php');
    
    $fullNameErr = $genderErr = '';
    $fullName = $email = $dob = $phone = $gender = '';
    $message = '';

    if(isset($_POST['saveBtn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        pr($_POST);

        if(empty($_POST['fullName'])) {
            $fullNameErr = "Full Name is required!";
        }else {
            $fullName = test_input($_POST['fullName']);
        }
        
        $email = test_input($_POST['email']);
        $dob = test_input($_POST['dob']);
        $phone = test_input($_POST['phone']);

        if(empty($_POST['gender'])) {
            $genderErr = "Gender is required!";
        }else {            
            $gender = test_input($_POST['gender']);
        }

        if(empty($fullNameErr) && empty($genderErr)) {
            $insert_student_sql = "INSERT INTO `students` (name,email,dob,phone,gender) VALUES ('$fullName','$email','$dob','$phone','$gender')";
            if($is_inserted = mysqli_query($conn,$insert_student_sql)) {
                $message = "Student Inserted Successfully!";
                $fullName = $email = $dob = $phone = $gender = '';
                header("Location:students.php?message=" . urlencode($message));
                exit();                
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
        <h1>Student Registration Form</h1>        
        <p class="text-danger">* Required</p>
        <div class="row">
            <div class="col-6">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="John Doe" value="<?php echo $fullName;?>">                            
                        </div>
                        <div class="col-sm-2">
                            <span class="text-danger">* <?php echo $fullNameErr;?></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?php echo $email;?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob;?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="+92-xxx-xxx-xxxx" value="<?php echo $phone;?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="gender" name="gender" aria-label="Gender Select">
                                <option value="" <?php if($gender == ''){echo "selected";}?>>Select Gender</option>
                                <option value="M" <?php if($gender == 'M'){echo "selected";}?>>Male</option>
                                <option value="F" <?php if($gender == 'F'){echo "selected";}?>>Female</option>
                                <option value="O" <?php if($gender == 'O'){echo "selected";}?>>Others</option>
                            </select>                            
                        </div>
                        <div class="col-sm-2">
                            <span class="text-danger">* <?php echo $genderErr;?></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <button type="submit" class="btn btn-primary" name="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>