<?php



$user = "root";
$pass = "2(2[-Tohviif9Kk3";

//DBと接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2chbbs', $user, $pass);
echo "DBとの接続に成功しました";
} catch (PDOException $error) {
    echo $error->getMessage();
}