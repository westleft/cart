<?php

require_once './cart.php';
$cart->remove($_GET['id']);

// echo $_SESSION['cartItems'];
// echo '<pre>', print_r($_SESSION['cartItems'][$_GET['id']]), '</pre>';

header('Location: ../index.php');
