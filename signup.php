<?php
$pageTitle = "Sign Up";
require_once 'header.php';
require_once 'db.php'; 

$name = $email = $password = '';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die('Error preparing statement: ' . $mysqli->error);
        }

        $stmt->bind_param('sss', $name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<p>User registered successfully!</p>";
        } else {
            echo "<p>Error registering user: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}
?>

<main class="container mt-4">
    <h2>Sign Up</h2>
    <form id="signupForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            <?php if (isset($errors['name'])) : ?>
                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <?php if (isset($errors['email'])) : ?>
                <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" id="password" name="password" required>
            <?php if (isset($errors['password'])) : ?>
                <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</main>

<?php require_once 'footer.php'; ?>

