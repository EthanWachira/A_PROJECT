<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Diary - Sign Up / Sign In</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    $pageTitle = "Digital Diary - Sign Up / Sign In";
    include 'header.php'; 
    ?>

    <div class="container mt-4">
        <h2>Sign Up / Sign In</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="true">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="false">Sign In</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Sign Up Tab -->
            <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                <form method="post" action="signup_process.php">
                    <div class="form-group">
                        <label for="signup_username">Username</label>
                        <input type="text" class="form-control" id="signup_username" name="signup_username" required>
                    </div>
                    <div class="form-group">
                        <label for="signup_password">Password</label>
                        <input type="password" class="form-control" id="signup_password" name="signup_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>

            <!-- Sign In Tab -->
            <div class="tab-pane fade" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                <form method="post" action="signin_process.php">
                    <div class="form-group">
                        <label for="signin_username">Username</label>
                        <input type="text" class="form-control" id="signin_username" name="signin_username" required>
                    </div>
                    <div class="form-group">
                        <label for="signin_password">Password</label>
                        <input type="password" class="form-control" id="signin_password" name="signin_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

