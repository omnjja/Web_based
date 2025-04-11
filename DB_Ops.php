<?php
$host = 'localhost';
$username = 'Alia'; 
$password = '1234'; 
$dbname = 'user_registration';

function dbConnect() {
    global $host, $username, $password, $dbname;
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
} ?>