<?php
require_once 'db.php';
session_start();

$pageTitle = "Checkout";
include 'header.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='container mt-4'><h2>Your Cart is Empty</h2></div>";
} else {
    ?>
    <main class="container mt-4">
        <h2>Checkout</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Your Cart</h5>
                        <ul class="list-group">
                            <?php
                            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                                $sql = "SELECT * FROM products WHERE product_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $product_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $product = $result->fetch_assoc();

                                if ($product) {
                                    ?>
                                    <li class="list-group-item">
                                        <span><?php echo htmlspecialchars($product['product_name']); ?></span>
                                        <span class="float-right">$<?php echo htmlspecialchars($product['price']); ?></span>
                                        <span class="float-right"><?php echo $quantity; ?> x </span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <p>Total Items: <?php echo count($_SESSION['cart']); ?></p>
                        <p>Total Amount: $<?php echo calculateTotal(); ?></p>
                        <form action="placeorder.php" method="POST">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                            <a href="clearcart.php" class="btn btn-danger">Clear Cart</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
}

include 'footer.php';

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
        if ($product) {
            $total += $product['price'] * $quantity;
        }
    }
    return $total;
}

$conn->close();
?>
