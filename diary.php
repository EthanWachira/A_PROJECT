<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Diary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
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
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up/Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
    <?php
// Array to hold saved entries (for demonstration purposes)
$savedEntries = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (for demonstration, you may want to add more validation)
    $date = date("Y-m-d H:i:s"); // Current date and time
    $entry = htmlspecialchars($_POST['journal_entry']); // Sanitize journal entry

    // Save entry to array
    $savedEntries[] = [
        'date' => $date,
        'entry' => $entry
    ];

    // You can save to database or file for persistence
    // Example: Save to a file (for demonstration)
    $file = 'saved_entries.txt';
    $data = json_encode($savedEntries);
    file_put_contents($file, $data);
}

include 'header.php';
?>

<div class="container mt-4">
    <h2>Diary - Enter Journal Entry</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="journal_entry">Journal Entry</label>
            <textarea class="form-control" id="journal_entry" name="journal_entry" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Entry</button>
    </form>

    <hr>

    <h2>Saved Entries</h2>
    <?php if (!empty($savedEntries)) : ?>
        <ul class="list-group">
            <?php foreach ($savedEntries as $savedEntry) : ?>
                <li class="list-group-item">
                    <strong><?php echo $savedEntry['date']; ?></strong><br>
                    <?php echo nl2br($savedEntry['entry']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No entries yet.</p>
    <?php endif; ?>
</div>

        <!-- Add any additional footer content here if needed -->
        <hr>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Digital Diary. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

      



