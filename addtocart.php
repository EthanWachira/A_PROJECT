<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];

        $sql = "INSERT INTO orders (user_id, product_id, cost) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $cost = calculateCost($product_id);

            $stmt->bind_param("iis", $user_id, $product_id, $cost);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Product added to cart successfully!";
            } else {
                echo "Failed to add product to cart.";
            }

            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "User session not found. Please log in.";
    }
} else {
    echo "Invalid request.";
}

function calculateCost($product_id) {
    global $conn;
    $sql = "SELECT price FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['price'];
        }

        $stmt->close();
    }
    
    return 0; 
}

$conn->close();
?>
