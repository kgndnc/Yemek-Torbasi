<?php
session_start();
unset($_SESSION['cart']);
header("Location: show_cart.php");