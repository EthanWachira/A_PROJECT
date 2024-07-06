<?php
$pageTitle = "Sign In";
require_once 'header.php';
?>

<main class="container mt-4">
    <h2>Sign In</h2>
    <form id="signinForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</main>

<?php require_once 'footer.php'; ?>
