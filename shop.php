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
            require_once 'db.php';

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">$<?php echo $row['price']; ?></p>
                            <button class="btn btn-primary add-to-cart-btn" data-product-id="<?php echo $row['id']; ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "No products found";
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
