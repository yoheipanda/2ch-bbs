<?php
$user = "root"
$pass = "Smc12345"
//DBと接続
try{
$pdo = new PDO('mysql:host=localhost;dbname=2chbbs', $root, $pass);
echo "DBとの接続に成功しました";
}catch(PDOException $error){
    ecoh $error->getMesssage();
}