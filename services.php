<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
        .card {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php require_once 'header.php'; ?>
        </header>

        <main class="container mt-4">
            <h2>Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="web,jpeg.jpeg" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">We offer state-of-the-art web development services to build dynamic and responsive websites.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="app.jpeg" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">App Development</h5>
                            <p class="card-text">Our team excels in creating user-friendly mobile applications for both Android and iOS platforms.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="seo.png" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">SEO Optimization</h5>
                            <p class="card-text">Enhance your online presence and boost your search engine rankings with our expert SEO services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <?php require_once 'footer.php'; ?>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
