<?php
$pageTitle = "Shop";
include 'header.php';
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
        <!-- Example product 1 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="laptop1.jpg" class="card-img-top" alt="TechInvo Laptop V1">
                <div class="card-body">
                    <h5 class="card-title">TechInvo Laptop V1</h5>
                    <p class="card-text">$1200</p>
                    <button class="btn btn-primary add-to-cart-btn" data-product-id="1">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Example product 2 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="laptop2.jpg" class="card-img-top" alt="TechInvo Laptop V2">
                <div class="card-body">
                    <h5 class="card-title">TechInvo Laptop V2</h5>
                    <p class="card-text">$1400</p>
                    <button class="btn btn-primary add-to-cart-btn" data-product-id="2">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Example product 3 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="charger1.jpg" class="card-img-top" alt="TechInvo Charger V1">
                <div class="card-body">
                    <h5 class="card-title">TechInvo Charger V1</h5>
                    <p class="card-text">$50</p>
                    <button class="btn btn-primary add-to-cart-btn" data-product-id="3">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Example product 4 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="charger2.jpg" class="card-img-top" alt="TechInvo Charger V2">
                <div class="card-body">
                    <h5 class="card-title">TechInvo Charger V2</h5>
                    <p class="card-text">$60</p>
                    <button class="btn btn-primary add-to-cart-btn" data-product-id="4">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
