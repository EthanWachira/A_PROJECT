<?php
$pageTitle = "Order Confirmation";
require_once 'header.php';
?>

<main class="container mt-4">
    <h2>Order Confirmation</h2>
    <div class="alert alert-success" role="alert">
        Thank you for your order!
    </div>

    <h4>Order Details</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $total = 0;
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    $sql = "SELECT product_name, price FROM products WHERE product_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $product = $result->fetch_assoc();
                        $total += $product['price'] * $quantity;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($quantity); ?></td>
                            <td>$<?php echo htmlspecialchars($product['price'] * $quantity); ?></td>
                        </tr>
                        <?php
                    } else {
                        echo "<tr><td colspan='4'>Product not found for ID: $product_id</td></tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='4'>No products in cart</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="alert alert-info">
        Total Amount: $<?php echo htmlspecialchars($total); ?>
    </div>
</main>

<?php include 'footer.php'; ?>

<?php
unset($_SESSION['cart']);
$conn->close();
?>
