<?php
require_once 'db.php';
require 'vendor/autoload.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$code = rand(100000, 999999); 

$sql = "UPDATE users SET 2fa_code = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $code, $user_id);

if ($stmt->execute()) {
    $sql = "SELECT email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $email = $user['email'];
    $subject = "Your 2FA Code";
    $message = "Your 2FA code is $code";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com';
    $mail->Password = 'your_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('no-reply@example.com', 'Your Website');
    $mail->addAddress($email);

    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        header("Location: verify_2fa.php");
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Error: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
