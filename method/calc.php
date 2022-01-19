<?php
require_once __DIR__."../../vendor/autoload.php";

use app\method\Cart;

$cart = new Cart();
$cart->calc($_GET['id'], $_GET['operation']);

header('Location: ../index.php');