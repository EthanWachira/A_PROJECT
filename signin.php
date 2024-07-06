<?php
$pageTitle = "Sign In";
require_once 'header.php';
require_once 'db.php'; 

$email = $password = '';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required";
    }

    if (empty($errors)) {
        
        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";

        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die('Error preparing statement: ' . $mysqli->error);
        }

        $stmt->bind_param('s', $email);

        
        if ($stmt->execute()) {
            
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
        
                $stmt->bind_result($user_id, $user_name, $user_email, $hashed_password);

                if ($stmt->fetch()) {
                    
                    if (password_verify($password, $hashed_password)) {
                        
                        session_start();

                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['user_email'] = $user_email;

                        header("Location: profile.php");
                        exit();
                    } else {
                        $errors['password'] = "Incorrect password";
                    }
                }
            } else {
                $errors['email'] = "User not found";
            }
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
?>

<main class="container mt-4">
    <h2>Sign In</h2>
    <form id="signinForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</main>

<?php require_once 'footer.php'; ?>
