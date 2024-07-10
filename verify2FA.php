<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];

    $sql = "SELECT 2fa_code FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user['2fa_code'] == $code) {
        $_SESSION['2fa'] = true; 
        header("Location: dashboard.php"); 
    } else {
        echo "Invalid 2FA code.";
    }
    $stmt->close();
}
$conn->close();
?>

<form method="POST" action="verify_2fa.php">
    <input type="text" name="code" placeholder="Enter 2FA Code" required>
    <button type="submit">Verify</button>
</form>
