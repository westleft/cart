<?php
$connection = require_once './connection.php';

$products = $connection->getProducts();
// echo '<pre>',print_r($products),'</pre>';
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
    <div class="header">
        <ul>
            <li>
                <a href="#">Shop</a>
            </li>
            <li>
                <a href="#">Cart</a>
            </li>
        </ul>
    </div>
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
                <?php foreach ($products as $product) : ?>
                    <li>
                        <div class="product">
                            <img src="<?php echo $product['image']; ?>" alt="">
                            <p>
                                <?php echo $product['title']; ?>
                            </p>
                        </div>
                        <p class="price">
                            <?php echo $product['price']; ?>
                        </p>
                        <div class="quantity">
                            <div class="quantity_inner">
                                <button> - </button>
                                <p>2</p>
                                <button> + </button>
                            </div>
                        </div>
                        <p class="total">$240</p>
                        <a href="" class="remove">X</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="summary">
                <div class="content">
                    <h3>Order Summary</h3>
                    <p>Subtotal<span>$418</span></p>
                    <p class="shipping">Shipping<span>Free</span></p>
                    <p class="total">Total<span>$100<span></p>
                </div>
                <button>CHECKOUT</button>
            </div>

        </div>

    </div>
</body>

</html>