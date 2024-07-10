<?php
session_start();
unset($_SESSION['cart']);
header("Location: shop.php");
exit();
?>
