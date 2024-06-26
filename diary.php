<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Diary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
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
            font-size: 1.375rem; 
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
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
            <div class="container mt-4">
                <h2>Express Yourself</h2>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="diary_entry">Diary Entry</label>
                        <textarea class="form-control" id="diary_entry" name="diary_entry" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Entry</button>
                </form>

                <hr>

                <h2>Saved Entries</h2>
                <?php 
                // Function to load saved entries from file
                function loadSavedEntries() {
                    $file = 'saved_entries.txt';
                    if (file_exists($file)) {
                        $data = file_get_contents($file);
                        return json_decode($data, true);
                    }
                    return [];
                }

                // Function to save entries to file
                function saveEntries($entries) {
                    $file = 'saved_entries.txt';
                    $data = json_encode($entries);
                    file_put_contents($file, $data);
                }

                // Load saved entries
                $savedEntries = loadSavedEntries();

                // Check if form is submitted to add new entry
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = date("Y-m-d H:i:s"); 
                    $entry = htmlspecialchars($_POST['diary_entry']); // Sanitize diary entry

                    // Add new entry
                    $savedEntries[] = [
                        'id' => uniqid(), 
                        'date' => $date,
                        'entry' => $entry
                    ];

                    // Save updated entries to file
                    saveEntries($savedEntries);
                }

                // Check if delete action is triggered
                if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
                    $idToDelete = $_GET['id'];

                    // Validate idToDelete before using it
                    if (!empty($savedEntries)) {
                        foreach ($savedEntries as $key => $entry) {
                            if (isset($entry['id']) && $entry['id'] == $idToDelete) {
                                unset($savedEntries[$key]); // Remove entry from array
                                saveEntries($savedEntries); // Save updated entries back to file
                                break; // Exit loop once entry is deleted
                            }
                        }
                    }

                    // Redirect to avoid resubmission on refresh
                    header("Location: diary.php");
                    exit();
                }

                // Reload saved entries after any changes
                $savedEntries = loadSavedEntries();

                // Display saved entries
                if (!empty($savedEntries)) : ?>
                    <ul class="list-group">
                        <?php foreach ($savedEntries as $savedEntry) : ?>
                            <li class="list-group-item">
                                <div>
                                    <strong><?php echo $savedEntry['date']; ?></strong>
                                    <a href="?action=delete&id=<?php echo $savedEntry['id']; ?>" class="btn btn-sm btn-danger float-right ml-2" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                                </div>
                                <p><?php echo nl2br($savedEntry['entry']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No entries yet.</p>
                <?php endif; ?>
            </div>

            <footer class="mt-4">
                <p>&copy; <?php echo date('Y'); ?> Digital Diary. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
