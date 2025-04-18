<?php

include 'DB_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = $_POST["full_name"];
  $user_name = $_POST["user_name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $whatsapp = $_POST["whatsapp"];
  $address = $_POST["address"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (full_name, user_name, email, phone, whatsapp_number, address, password, user_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $full_name, $user_name, $email, $phone, $whatsapp, $address, $password, $imageFileName);

  include 'Upload.php'; 

if ($uploadStatus['status'] === 'success') {
    $imageFileName = $uploadStatus['file_name'];
} else {
    echo "<script>alert('Image Upload Failed: " . $uploadStatus['msg'] . "'); window.location.href='index.php';</script>";
    exit();
}
  
  if ($stmt->execute()) {
      echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
  } else {
      echo "<script>alert('Error saving data.'); window.location.href='index.php';</script>";
  }

  $stmt->close();
  $conn->close();
}
 ?>
