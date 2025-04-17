<?php
include 'DB_Connection.php'; // Your DB connection file

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    echo ($count > 0) ? "taken" : "available";
    
    $stmt->close();
    $conn->close();
}
?>
