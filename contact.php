<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-size: 18px;
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
        h2, h4, p {
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php require_once 'header.php'; ?>
        </header>

        <main class="container mt-4 main-content">
            <h2>Contact Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Email:</h4>
                    <p>techinvoenterprise@tech.org
                       techinvo@support.org
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Phone:</h4>
                    <p>+2540723456789 or +2540145678901
                    </p>
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
