<?php
$host = 'localhost';
$username = 'Alia'; 
$password = '1234'; 
$dbname = 'user_registration';

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
 ?>