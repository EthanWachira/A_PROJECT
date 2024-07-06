<?php
require_once 'db.sql';

$pageTitle = "Shop";
include 'header.php';

function sanitize($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    session_start();
    $user_id = $_SESSION['user_id'];

    $product_id = sanitize($_POST['product_id']);

    $sql = "INSERT INTO orders (user_id, product_id, cost) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iis", $user_id, $product_id, $cost);
        $cost = calculateCost($product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div class='alert alert-success' role='alert'>Product added to cart successfully!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Failed to add product to cart.</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<main class="container mt-4">
    <h2>Shop</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text">$<?php echo htmlspecialchars($row['price']); ?></p>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['product_id']); ?>">
                                <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
