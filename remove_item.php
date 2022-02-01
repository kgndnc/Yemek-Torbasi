<?php
session_start();
$item = $_POST['item_key'];

if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$item]) ) {
    unset($_SESSION['cart'][$item]);
    header("Location: show_cart.php");
}
else
    die("Error removing item");

echo $_SESSION['cart'][$item];