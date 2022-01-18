<?php

class Connection
{

  public PDO $pdo;

  public function __construct()
  {
    $servername = "localhost";
    $dbname = "cart";
    $username = "root";
    $password = "root";
    try {
      $this->pdo = new PDO("mysql:host = $servername; dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connection success";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getProducts()
  {
    $mysqlRequest = "SELECT * FROM cart ORDER BY title DESC";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function register($account, $password){
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $mysqlRequest = "INSERT INTO users(account, password) VALUES(:account, :password);";

    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->execute(array(
      'account' => $account,
      'password' => $hash_password,
    ));
  }

  public function logIn($account, $password){
    $mysqlRequest = "SELECT account,`password` FROM users WHERE account = :account ";

    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->execute(array(
      'account' => $account,
    ));
    $hash = $statement->fetch(PDO::FETCH_ASSOC)["password"];

    if(password_verify($password, $hash)){
      $_SESSION['user'] = 'logined';
    }else{
      $error_message = '登入失敗';
      return $error_message;
    }
  }

}

return new Connection();
