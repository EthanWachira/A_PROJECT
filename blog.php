<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Diary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        p {
            font-size: 1.25rem; /* Increased by two sizes (20px if base size is 16px) */
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Digital Diary</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="diary.php">Diary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="authorization.php">Sign Up/Sign In</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container mt-4 content">
            <h2>Blog</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Finding Peace Through Journaling: A Personal Journey</h5>
                    <p class="card-text">In the chaos of everyday life, journaling became my sanctuary—a place where my thoughts found clarity and my aspirations took flight.</p>
                    <p class="card-text">Through self-reflection and gratitude, journaling transformed my days. It provided a path to clarity, cultivating resilience and inner peace amidst life’s challenges.</p>
                    <p class="card-text">Embracing journaling as a daily ritual, I discovered the power of intentionality and the joy of celebrating life’s simple pleasures. It became more than just writing; it became a journey of growth and self-discovery.</p>
                    <p class="card-text">If you seek peace and clarity, consider starting your own journaling journey today. Let it be a reflection of your authentic self and a canvas for your dreams.</p>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Digital Diary. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




