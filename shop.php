<?php
    require_once __DIR__."/vendor/autoload.php";

    use app\Connection;
    use app\method\Cart;

    $connection = new Connection();    
    $products = $connection->getProducts();

    $cart = new Cart();

    $new_products = array_column($products, 'id');
    array_multisort($new_products, SORT_ASC, $products);

    if (isset($_GET['id'])) {
        $product = $products[$_GET['id'] - 1];
        $cart->addToCart($product);
    }
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
    <?php require_once './layouts/header.php'; ?>

    <div class="shop_content">
        <ul>
            <?php foreach ($products as $product) : ?>
                
                <?php echo $product['img']; ?>
                <li class="product">
                    <img src="<?php echo $product['image']; ?>" alt="">
                    <h3>
                        <?php echo $product['title']; ?>
                    </h3>
                    <p class="price">
                        $<?php echo $product['price']; ?>
                    </p>
                    <a href="shop.php?id=<?php echo $product['id'] ?>" class="buy">
                        <img src="./images/shopping-cart.png" alt="">
                        Buy Now
                    </a>
                    <?php echo $product['id'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


    <a href="./method/clear.php">clearAll</a>
</body>

</html>