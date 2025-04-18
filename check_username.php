 <?php
include 'DB_conn.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    
    header('Content-Type: application/json');
    echo json_encode(['status' => ($count > 0) ? 'taken' : 'available']);

    $stmt->close();
    $conn->close();
} 

?> 
