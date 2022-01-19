<?php
    $shipping_data = $cart->shipping();
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
            <?php if($_SESSION['user']):  ?>
                <a href="../login.php?type=logged">LOGOUT</a>
            <?php else: ?>
                <a href="../login.php">LOGIN</a>
                <a href="../register.php">Register</a>
            <?php endif; ?>
        </li>
    </ul>
</div>