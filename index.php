<?php
$connection = require_once './connection.php';
require_once './method/cart.php';

$products = $connection->getProducts();
$shipping_data = $cart->shipping();
// echo '<pre>', print_r($_SESSION['cartItems']), '</pre>';
echo $shipping_data['qty'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 購物車</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./scss/main.css">

</head>

<body>
<?php require_once './content/header.php' ?>
    <div class="cart">
        <h2>Your Cart</h2>
        <div class="container">
            <ul>
                <li>
                    <p class="product">PRODUCT</p>
                    <p class="price">PRICE</p>
                    <p class="quantity">QUANTITY</p>
                    <p class="total">TOTAL</p>
                </li>
                <?php foreach ($_SESSION['cartItems'] as $product) : ?>
                    <li>
                        <div class="product">
                            <img src="<?php echo $product['item']['image']; ?>" alt="">
                            <p>
                                <?php echo $product['item']['title']; ?>
                            </p>
                        </div>
                        <p class="price">
                            $<?php echo $product['item']['price']; ?>
                        </p>
                        <div class="quantity">
                            <div class="quantity_inner">
                                <a href="<?php echo './method/calc.php?id=' . $product['item']['id'] . '&operation=decrease'; ?>">−</a>
                                <p><?php echo $product['qty']; ?></p>
                                <a href="<?php echo './method/calc.php?id=' . $product['item']['id'] . '&operation=add'; ?>">＋</a>
                            </div>
                        </div>
                        <p class="total">
                            $<?php echo $product['total']; ?>
                        </p>
                        <a href="./method/remove.php?id=<?php echo $product['item']['id']; ?>" class="remove">×</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="summary">
                <div class="content">
                    <h3>Order Summary</h3>
                    <p>Subtotal
                        <span>
                            <?php echo $shipping_data['total']; ?>
                        </span>
                    </p>
                    <p class="shipping">Shipping
                        <span>
                            <?php echo $shipping_data['shipping']; ?>
                        </span>
                    </p>
                    <p class="total">Total
                        <span>
                            <?php echo $shipping_data['total_price']; ?>
                        <span>
                    </p>
                </div>
                <button>CHECKOUT</button>
            </div>
        </div>
    </div>
</body>

</html>