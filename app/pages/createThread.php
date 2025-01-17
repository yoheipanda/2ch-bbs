<?php 

include_once("../database/connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2ちゃんねる掲示板</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <?php include("../parts/header.php"); ?>
  <!-- バリデーションチェック -->
  <?php include("../parts/varidation.php"); ?>
  <div style="padding-left: 36px; color: blue;">
  <h2 style="margin-top: 20px; margin-bottom: 0;">新規スレッド立ち上げ場</h2>
  </div>
  <form method="POST" class="formwrapper">
    <div>
      <lavel>スレッド名</lavel>
      <input type="text" name="title">
      <lavel>名前<lavel>
      <input type="text" name="username">
    </div>
    <div>
      <textarea name="body" class="commentTextArea"></textarea>
    </div>
    <input type="submit" value="立ち上げ" name="threadSubmitButton">
  </form>
</body>

</html>