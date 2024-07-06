<?php
require_once 'db.php';

$pageTitle = "Shop";
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'header.php'; ?>

    <main class="container mt-4">
        <h2>Shop</h2>
        <div class="row">
            <?php
            if ($conn) {
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "<p>Error: " . $conn->error . "</p>";
                } elseif ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                    <p class="card-text">$<?php echo htmlspecialchars($row['price']); ?></p>
                                    <button class="btn btn-primary add-to-cart-btn" data-product-id="<?php echo htmlspecialchars($row['id']); ?>">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No products found</p>";
                }
            } else {
                echo "<p>Database connection failed.</p>";
            }

            $conn->close();
            ?>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

