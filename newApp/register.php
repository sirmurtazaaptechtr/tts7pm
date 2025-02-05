<?php
    require('connection.inc.php');
    
    $fullNameErr = $emailErr  = $passwordErr = $rPasswordErr =  $genderErr = '';
    $uploadErr = [];
    $target_file = $fullName = $email = $password = $rPassword = $dob = $phone = $gender = '';
    $message = '';

    if(isset($_POST['saveBtn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        //pr($_POST);

        $target_dir = "assets/images/profile_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            array_push($uploadErr, "File is not an image.");
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        array_push($uploadErr, "Sorry, file already exists.");
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
        array_push($uploadErr, "Sorry, your file is too large.");
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            array_push($uploadErr, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        array_push($uploadErr, "Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                array_push($uploadErr, "Sorry, there was an error uploading your file.");
            }
        }

        if(empty($_POST['fullName'])) {
            $fullNameErr = "Full Name is required!";
        }else {
            $fullName = test_input($_POST['fullName']);
        }
        
        if(empty($_POST['email'])) {
            $emailErr = "Email is required!";
        }else {
            $email = test_input($_POST['email']);
            $email_sql = "SELECT * FROM `students` WHERE email = '$email'";
            $result = mysqli_query($conn,$email_sql);

            if(mysqli_num_rows($result)>0) {
                $emailErr = "Email already exists!";
            }
        }

        if(empty($_POST['password'])) {
            $passwordErr = "Password is Required!";
        }else {
            $password = test_input($_POST['password']);
        }

        if(empty($_POST['rPassword'])) {
            $rPasswordErr = "Re-Type Password";
        }else {
            $rPassword = test_input($_POST['rPassword']);
            if($password != $rPassword) {
                $rPasswordErr = "Password Missmatch!";
            }
        }
        $dob = test_input($_POST['dob']);
        $phone = test_input($_POST['phone']);

        if(empty($_POST['gender'])) {
            $genderErr = "Gender is required!";
        }else {            
            $gender = test_input($_POST['gender']);
        }

        if(empty($uploadErr) && empty($fullNameErr) && empty($genderErr) && empty($passwordErr) && empty($rPasswordErr) && empty($emailErr)) {
            $insert_student_sql = "INSERT INTO `students` (name,email,dob,phone,gender,profile_image) VALUES ('$fullName','$email','$dob','$phone','$gender','$target_file')";
            if($is_inserted = mysqli_query($conn,$insert_student_sql)) {
                $lastID = mysqli_insert_id($conn);
                $insert_login_sql = "INSERT INTO `logins` (user_id,role_id,password) VALUES ('$lastID',2,'$password')";
                if($is_inserted = mysqli_query($conn,$insert_login_sql)) {
                    $message = "Student (username:$email,password:$password) Created Successfully!";
                    $fullName = $email = $dob = $phone = $gender = '';
                    header("Location:login.php?message=" . urlencode($message));
                    exit();
                }
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
            <div class="col-8">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="fileToUpload" class="col-sm-2 col-form-lable">Select image to upload</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                        </div>                        
                    </div>
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
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?php echo $email;?>">
                        </div>
                        <div class="col-sm-2">
                            <span class="text-danger">* <?php echo $emailErr;?></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>">
                        </div>
                        <div class="col-sm-2">
                            <span class="text-danger">* <?php echo $passwordErr;?></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rPassword" class="col-sm-2 col-form-label">Re-Enter Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="rPassword" name="rPassword" value="<?php echo $rPassword;?>">
                        </div>
                        <div class="col-sm-2">
                            <span class="text-danger">* <?php echo $rPasswordErr;?></span>
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
                    <div class="mb-3">
                        <input type="reset" class="btn btn-primary" name="clearBtn" value="Clear">
                        <button type="submit" class="btn btn-success" name="saveBtn">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>