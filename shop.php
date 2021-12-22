<?php
    $connection = require_once './connection.php';
    require_once './method/cart.php';

    $products = $connection->getProducts();
    // echo '<pre>',print_r($products),'</pre>';
    if (isset($_GET['id'])) {
        // echo '<pre>', print_r($products[$_GET['id']-1]), '</pre>';
        $product = $products[$_GET['id'] - 1];
        $cart->addToCart($product);
        // echo '<pre>', print_r($product), '</pre>';
    }
    echo $shipping_data['qty'];
    echo '<pre>', print_r($_SESSION), '</pre>';
    // echo '<pre>', print_r($products[$_GET['id']]), '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/main.css">
</head>

<body>
    <?php require_once './content/header.php'; ?>

    <div class="shop_content">
        <ul>
            <li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="./shop.php" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li>
            <li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="#" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li><li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="#" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li><li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="#" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li><li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="#" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li><li class="product">
                <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                <h3>魔鬼剋星</h3>
                <p class="price">$299</p>
                <a href="#" class="buy">
                    <img src="./images/shopping-cart.png" alt="">
                    Buy Now
                </a>
            </li>

            <?php foreach ($products as $product) : ?>
                <li class="product">
                    <img src="https://movies.yahoo.com.tw/i/o/production/movies/January2021/TFaMaFvMK3nwkWhpxFvy-757x1080.jpg" alt="">
                    <?php echo $product['title']; ?>
                    <a href="?id=<?php echo $product['id'] ?>">Buy Now</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


    <a href="./method/clear.php">clearAll</a>
</body>

</html>