<?php
$pageTitle = "Digital Diary - Sign Up / Sign In";
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "<div class='container mt-4'>";
    echo "<h2>Sign Up / Sign In</h2>";
    echo "<p>Thank you for signing up, $username!</p>";
    echo "</div>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "<div class='container mt-4'>";
    echo "<h2>Sign Up / Sign In</h2>";
    echo "<p>Welcome back, $username!</p>";
    echo "</div>";
} else {
    
?>
<div class="container mt-4">
    <h2>Sign Up / Sign In</h2>

    <!-- Sign Up Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Sign Up</h3>
        <div class="form-group">
            <label for="username_signup">Username</label>
            <input type="text" class="form-control" id="username_signup" name="username" required>
        </div>
        <div class="form-group">
            <label for="password_signup">Password</label>
            <input type="password" class="form-control" id="password_signup" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
    </form>

    <hr>

    <!-- Sign In Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Sign In</h3>
        <div class="form-group">
            <label for="username_signin">Username</label>
            <input type="text" class="form-control" id="username_signin" name="username" required>
        </div>
        <div class="form-group">
            <label for="password_signin">Password</label>
            <input type="password" class="form-control" id="password_signin" name="password" required>
        </div>
        <button type="submit" class="btn btn-success" name="signin">Sign In</button>
    </form>
</div>

<?php
}

include 'footer.php';
?>

