<?php
    require_once './method/cart.php';
    $connection = require_once './connection.php';

    if($_SESSION['user']){
        header('Location: ./shop.php'); // 已經登入滾回首頁
    }

    if($_POST){
        $error_message = $connection->logIn($_POST['account'], $_POST['password']);
    }elseif($_GET['type'] == 'logged'){
        unset($_SESSION['user']);
        header('Location: ./shop.php'); // 登出完滾回首頁
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./scss/main.css">
</head>
<body>
    <?php require_once './layouts/header.php'; ?>

    <form method="POST">
        <h3>登入</h3>
        <input type="text" name="account">
        <input type="password" name="password">
        <button type="submit">submit</button>
    </form>
    <?php echo $error_message; ?>
</body>
</html>