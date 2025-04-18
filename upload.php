<?php
$uploadStatus = ['status' => 'error', 'msg' => 'Unknown error'];

if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == 0) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["user_image"]["name"]);
    $targetFile = $targetDir . time() . "_" . $fileName; // prevent duplicate names
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if (!in_array($fileType, $allowedTypes)) {
        $uploadStatus['msg'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
    } elseif ($_FILES["user_image"]["size"] > $maxSize) {
        $uploadStatus['msg'] = "File is too large. Max size is 2MB.";
    } else {
        if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $targetFile)) {
            $uploadStatus['status'] = 'success';
            $uploadStatus['file_name'] = basename($targetFile);
        } else {
            $uploadStatus['msg'] = "There was an error uploading your file.";
        }
    }
} else {
    $uploadStatus['msg'] = "No file was uploaded or upload error.";
}
?>
