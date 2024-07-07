<?php
session_start();

// Clear the cart by unsetting the session variable
unset($_SESSION['cart']);

// Redirect back to the checkout page or any appropriate page
header("Location: checkout.php");
exit();
?>
