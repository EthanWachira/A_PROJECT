<?php
require_once 'db.php'; /

session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die('No items in the cart.');
}

$total = 0;

$orderDetails = '';

foreach ($_SESSION['cart'] as $productId) {
  
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = htmlspecialchars($row['product_name']);
        $price = htmlspecialchars($row['price']);

        $quantity = array_count_values($_SESSION['cart'])[$productId];

        $subtotal = $price * $quantity;
        $total += $subtotal;

        $orderDetails .= "<div><strong>{$productName}</strong><br>";
        $orderDetails .= "Price: \${$price}<br>";
        $orderDetails .= "Quantity: {$quantity}<br>";
        $orderDetails .= "Subtotal: \${$subtotal}</div><hr>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<main class="container mt-4">
    <h2>Order Details</h2>
    <div>
        <?php echo $orderDetails; ?>
        <strong>Total: $<?php echo number_format($total, 2); ?></strong>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
