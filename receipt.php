<?php
require_once 'db.php';

$pageTitle = "Order Receipt";
include 'header.php';

session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $sql = "SELECT products.product_name, orders.quantity, orders.price, orders.total
            FROM orders
            INNER JOIN products ON orders.product_id = products.product_id
            WHERE orders.order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order_details = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "<p>Invalid order ID.</p>";
    exit();
}

?>

<main class="container mt-4">
    <h2>Order Receipt</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <ul class="list-group">
                <?php foreach ($order_details as $order_item): ?>
                    <li class="list-group-item">
                        <span><?php echo htmlspecialchars($order_item['product_name']); ?></span>
                        <span class="float-right"><?php echo htmlspecialchars($order_item['quantity']); ?> x $<?php echo htmlspecialchars($order_item['price']); ?></span>
                    </li>
                    <?php endforeach; ?>
                <li class="list-group-item">
                    <strong>Total:</strong>
                    <span class="float-right">$<?php echo htmlspecialchars($order_details[0]['total']); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <a href="shop.php" class="btn btn-primary">Back to Shop</a>
</main>

<?php include 'footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>

               
