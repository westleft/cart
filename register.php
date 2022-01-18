<?php
    $connection = require_once './connection.php';

    if($_POST){
        $connection->register($_POST['account'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./scss/main.css">
</head>
<body>
    <?php require_once './layouts/header.php'; ?>

    <form method="POST">
        <h3>註冊</h3>
        <input type="text" name="account">
        <input type="password" name="password">
        <button type="submit">submit</button>
    </form>
</body>
</html>