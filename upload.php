<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
$image = basename($_FILES["uploadedFile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploadedFile"]["tmp_name"]);
    
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;

    } else {

        echo "File is not an image.";
        $uploadOk = 0;

    }

}

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

} else {

    if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {

        header("Location: admin.php");

    } else {

        echo "Sorry, there was an error uploading your file.";

    }

}

?>
