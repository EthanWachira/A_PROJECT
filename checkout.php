<?php
require_once 'db.php';

$pageTitle = "Checkout";
include 'header.php';

session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='container mt-4'><h2>Your Cart is Empty</h2></div>";
    include 'footer.php';
    exit();
}
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
                        foreach (array_count_values($_SESSION['cart']) as $product_id => $quantity) {
                            $sql = "SELECT * FROM products WHERE product_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $product_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $product = $result->fetch_assoc();
                            ?>
                            <li class="list-group-item">
                                <span><?php echo htmlspecialchars($product['product_name']); ?></span>
                                <span class="float-right">$<?php echo htmlspecialchars($product['price']); ?> x <?php echo $quantity; ?></span>
                            </li>
                            <?php
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

<?php include 'footer.php'; ?>

<?php
function calculateTotal() {
    global $conn;
    $total = 0;
    foreach (array_count_values($_SESSION['cart']) as $product_id => $quantity) {
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
