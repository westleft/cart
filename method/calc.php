<?php

require_once './cart.php';
$cart->calc($_GET['id'], $_GET['operation']);

// echo '<pre>', print_r($_SESSION['cartItems'][$_GET['id']]), '</pre>';

header('Location: ../index.php');