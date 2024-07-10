<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Innovators - About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .main-content {
            margin-bottom: 60px;
        }
        .main-content p {
            font-size: 18px; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php require_once 'header.php'; ?>
        </header>

        <main class="container mt-4 main-content">
            <h2>About Us</h2>
            <p>Tech Innovators is at the forefront of revolutionizing technological solutions that empower businesses across diverse industries to surpass their objectives. With a passionate team of seasoned professionals, we specialize in delivering innovative, high-impact services and products meticulously crafted to meet the distinctive demands of our esteemed clients. Our commitment to excellence drives us to continually push boundaries in web development, mobile applications, and digital marketing strategies. We pride ourselves on fostering long-term partnerships built on trust, reliability, and exceptional results. At Tech Innovators, we are dedicated to not only meeting but exceeding expectations, ensuring every client receives tailored solutions that propel their business growth in an ever-evolving digital landscape. Here at Tech Innovators we have also developed gamechanging technology that builds a whole new technological landscape in the modern world of technology. Check out the shop if you have some time on your hands I promise you won't be dissapointed. That's all from us here at the Tech Innovators team I wish you a wonderful day and I wish you happy exploring as you embark this modern world of technology</p>
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
