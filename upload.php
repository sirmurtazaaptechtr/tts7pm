<?php
// PHP File Upload

/*
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
*/ 

//echo "<p>" . $_FILES['fileToUpload']['name']  . "</p>";
//echo "<p>" . basename($_FILES['fileToUpload']['name'])  . "</p>";


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

//echo "<p>$target_file</p>";

$is_Uploaded = move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);

//var_dump($is_Uploaded);

if($is_Uploaded) {
    echo "file uploaded successfully!";
}

?>

