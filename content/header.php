<?php
    $connection = require_once './connection.php';
    require_once './method/cart.php';
?>

<div class="header">
    <ul>
        <li>
            <a href="./shop.php">Shop</a>
        </li>
        <li>
            <a href="./index.php">
                <img src="../images/shopping-cart.png" alt="" class="cartIcon">
                <p class="cartQty">
                    <?php echo $shipping_data['qty'] ?? 0; ?>
                </p>
            </a>
        </li>
        <li>
            <a href="#">LOGIN</a>
        </li>
    </ul>
</div>