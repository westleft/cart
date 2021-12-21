<?php

require_once './cart.php';
$cart->clearAll();
echo '<pre>', print_r($_SESSION), '</pre>';

header('Location: ../shop.php');