<?php
$title = "Edit Student Information";
require('header.inc.php');

$fullNameErr = $emailErr  = $passwordErr = $rPasswordErr =  $genderErr = '';
$uploadErr = [];
$student_id = $fullName = $email = $password = $rPassword = $dob = $phone = $gender = $profile_image = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $student_id = test_input($_GET['id']);

    $student_sql = "SELECT *,students.id AS student_id FROM `students`
                        LEFT JOIN `logins` ON students.id =   logins.user_id
                        WHERE students.id = $student_id";

    if ($result = mysqli_query($conn, $student_sql)) {
        // pr($result);
        if (mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);
            // pr($student);

            $student_id = test_input($student['student_id']);
            $fullName = test_input($student['name']);
            $email = test_input($student['email']);
            $dob = test_input($student['dob']);
            $phone = test_input($student['phone']);
            $gender = test_input($student['gender']);
            $profile_image = test_input($student['profile_image']);
            $password = $rPassword = test_input($student['password']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveBtn'])) {
    // pr($_POST);

    if (!empty($_FILES["fileToUpload"]["name"])) {
        // prx($_FILES);
        
        $target_dir = "assets/images/profile_images/";
        $profile_image = $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
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
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            array_push($uploadErr, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($uploadErr, "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                array_push($uploadErr, "Sorry, there was an error uploading your file.");
            }
        }
    }

    $student_id = test_input($_POST['student_id']);

    if (empty($_POST['fullName'])) {
        $fullNameErr = "Full Name is required!";
    } else {
        $fullName = test_input($_POST['fullName']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required!";
    } else {
        $email = test_input($_POST['email']);
        $email_sql = "SELECT * FROM `students` WHERE email = '$email' AND id != '$student_id'";
        $result = mysqli_query($conn, $email_sql);

        if (mysqli_num_rows($result) > 0) {
            $emailErr = "Email already exists!";
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is Required!";
    } else {
        $password = test_input($_POST['password']);
    }

    if (empty($_POST['rPassword'])) {
        $rPasswordErr = "Re-Type Password";
    } else {
        $rPassword = test_input($_POST['rPassword']);
        if ($password != $rPassword) {
            $rPasswordErr = "Password Missmatch!";
        }
    }
    $dob = test_input($_POST['dob']);
    $phone = test_input($_POST['phone']);

    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required!";
    } else {
        $gender = test_input($_POST['gender']);
    }

    if (empty($fullNameErr) && empty($genderErr) && empty($passwordErr) && empty($rPasswordErr) && empty($emailErr) && empty($uploadErr)) {

        $update_student_sql = "UPDATE `students` 
            SET
            `name` = '$fullName', 
            `email` = '$email', 
            `dob` = '$dob', 
            `phone` = '$phone', 
            `gender` = '$gender',
            `profile_image` = '$profile_image'
            WHERE 
            `students`.`id` = '$student_id'";

        if ($is_updated = mysqli_query($conn, $update_student_sql)) {

            $update_login_sql = "UPDATE `logins` SET 
                `password` = '$password'
                WHERE `logins`.`user_id` = '$student_id'";

            if ($is_updated = mysqli_query($conn, $update_login_sql)) {
                $message = "Student (username:$email) has been updated Successfully!";
                $fullName = $email = $dob = $phone = $gender = '';
                header("Location:students.php?message=" . urlencode($message));
                exit();
            }
        }
    }
}
?>

<div class="container">
    <h1>Student Registration Form</h1>
    <div class="text-danger">
        <p>* Required </p>
        <ul> 
            <?php
             if(!empty($uploadErr)) {
                 foreach($uploadErr as $error) {
                    echo "<li>$error</li>";
                 }
             }?>
        </ul>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="student_id" class="col-sm-2 col-form-label">Student ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext" id="student_id" name="student_id" value="<?php echo $student_id; ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fileToUpload" class="col-sm-2 col-form-label">Select image to upload</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="previewImage(event)">
                        <img id="previewImage" src="<?php echo $profile_image; ?>" alt="Old Image" class="img-thumbnail mt-2" style="max-width: 300px;" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="John Doe" value="<?php echo $fullName; ?>">
                    </div>
                    <div class="col-sm-2">
                        <span class="text-danger">* <?php echo $fullNameErr; ?></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?php echo $email; ?>">
                    </div>
                    <div class="col-sm-2">
                        <span class="text-danger">* <?php echo $emailErr; ?></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                    </div>
                    <div class="col-sm-2">
                        <span class="text-danger">* <?php echo $passwordErr; ?></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rPassword" class="col-sm-2 col-form-label">Re-Enter Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="rPassword" name="rPassword" value="<?php echo $rPassword; ?>">
                    </div>
                    <div class="col-sm-2">
                        <span class="text-danger">* <?php echo $rPasswordErr; ?></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+92-xxx-xxx-xxxx" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="gender" name="gender" aria-label="Gender Select">
                            <option value="" <?php if ($gender == '') {
                                                    echo "selected";
                                                } ?>>Select Gender</option>
                            <option value="M" <?php if ($gender == 'M') {
                                                    echo "selected";
                                                } ?>>Male</option>
                            <option value="F" <?php if ($gender == 'F') {
                                                    echo "selected";
                                                } ?>>Female</option>
                            <option value="O" <?php if ($gender == 'O') {
                                                    echo "selected";
                                                } ?>>Others</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <span class="text-danger">* <?php echo $genderErr; ?></span>
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
<script>
    // Bind event listener for the file input
    document.getElementById('fileToUpload').addEventListener('change', function(event) {
        const fileInput = event.target;
        const preview = document.getElementById('previewImage');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>