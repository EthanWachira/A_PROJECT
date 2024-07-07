<?php
require_once 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id']; 

    $total_amount = calculateTotal(); 

    $sql = "INSERT INTO orders (user_id, price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $user_id, $total_amount);

    if ($stmt->execute()) {
        unset($_SESSION['cart']);
        header("Location: orderconfirmation.php"); 
        exit();
    } else {
        
        echo "Error placing order: " . $conn->error;
    }
} else {
    
    header("Location: shop.php");
    exit();
}

function calculateTotal() {
    global $conn;
    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT price FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $total += $product['price'] * $quantity;
    }
    return $total;
}

$conn->close();
?>
