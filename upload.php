<?php
include 'logging.php';

$allowedExtensions = ['gif', 'jpg', 'png'];

if(isset($_POST['SUBMIT'])) {
    $fName = $_FILES['imageUpload']['name'];
    $fSize = $_FILES['imageUpload']['size'];
    $fTmp = $_FILES['imageUpload']['tmp_name'];
    $fType = $_FILES['imageUpload']['type'];
    $fExt = strtolower(end(explode('.', $fName)));

    $uploadPath = 'uploads/' . basename($fName);

    if(!in_array($fExt, $allowedExtensions)) {
        echo "File Extension not Allowed";
        die();
    }
    if(file_exists($uploadPath)) {
        echo "Cannot OverWrite File: ". $uploadPath;
        die();
    } else {
        move_uploaded_file($fTmp, $uploadPath);
        echo "Move: " . $fTmp. "To: " . $uploadPath;
    }
}

?>
