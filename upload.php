<?php
// PHP File Upload

/*
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    die();
*/

//echo "<p>" . $_FILES['fileToUpload']['name']  . "</p>";
//echo "<p>" . basename($_FILES['fileToUpload']['name'])  . "</p>";


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//echo "<p>$target_file</p>";
$upload = true;// flag variable

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $upload = false;
    }

    // Check file size(1MB = 1,048,576 bytes)
    if ($_FILES["fileToUpload"]["size"] > 1048576) {
        echo "Sorry, your file is too large.";
        $upload = false;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $upload = false;
    }

    if($upload) {
        $is_Uploaded = move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
        //var_dump($is_Uploaded);

        if($is_Uploaded) {
            echo "file uploaded successfully!";
        }else {
            echo "Upload Failed!";
        }
    }
}
?>