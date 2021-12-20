<?php
    $connection = require_once './connection.php';

    $products = $connection->getProducts();
    // echo '<pre>',print_r($products),'</pre>';
    if(isset($_GET['id'])){
        echo '<pre>', print_r($products[$_GET['id']-1]), '</pre>';
    }

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
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>
                <?php echo $product['title'];?>
                <a href="?id=<?php echo $product['id'] ?>">Buy Now</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>