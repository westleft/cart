<?php
require_once __DIR__."../../vendor/autoload.php";

use app\method\Cart;

$cart = new Cart();
$cart->remove($_GET['id']);

header('Location: ../index.php');
