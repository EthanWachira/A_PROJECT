<?php
require_once 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $total_amount = calculateTotal();

    $sql = "INSERT INTO orders (user_id, product_id, quantity, price, total) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach (array_count_values($_SESSION['cart']) as $product_id => $quantity) {
        $price = getProductPrice($product_id);
        $total = $price * $quantity;

        $stmt->bind_param("iiisd", $user_id, $product_id, $quantity, $price, $total);
        $stmt->execute();
    }

    $order_id = $stmt->insert_id;

    unset($_SESSION['cart']);
    header("Location: receipt.php?order_id=$order_id");
    exit();
} else {
    header("Location: shop.php");
    exit();
}

function getProductPrice($product_id) {
    global $conn;
    $sql = "SELECT price FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    return $product['price'];
}

function calculateTotal() {
    global $conn;
    $total = 0;
    foreach (array_count_values($_SESSION['cart']) as $product_id => $quantity) {
        $price = getProductPrice($product_id);
        $total += $price * $quantity;
    }
    return $total;
}

$conn->close();
?>
