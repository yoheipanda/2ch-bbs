<?php
$user = "root";
$pass = "root";

//DBと接続
try {
    $pdo = new PDO('mysql:host=localhost;port=8000;dbname=2chbbs;charset=utf8', $user, $pass);
//echo "DBと接続に成功しました";
} catch (PDOException $error) {
    echo $error->getMessage();
}