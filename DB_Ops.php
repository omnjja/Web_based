<?php
include 'Upload.php'; 

if ($uploadStatus['status'] === 'success') {
    $imageFileName = $uploadStatus['file_name'];
} else {
    echo "<script>alert('Image Upload Failed: " . $uploadStatus['msg'] . "'); window.location.href='index.php';</script>";
    exit();
}

$host = 'localhost';
$username = 'Alia'; 
$password = '1234'; 
$dbname = 'user_registration';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
 ?>
