<?php 
include_once("./app/database/connect.php");

if(isset($_POST["submitButton"])){
  $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, ;body, :post_date);";
    $statement = $pdo->prepare($sql);
    //値をセットする。
    statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
  }
  
  $comment_array = array();
  
  
  $sql = "SELECT * FROM comment";
  $statement = $pdo->prepare ($sql);
  $statement->execute();
  
  $comment_array = $statement;
  
 // var_dump($comment_array->fetchAll());
  
?>



<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2ちゃんねる掲示板</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <header>
    <h1 class="title ">2ちゃんねる掲示板</h1>
    <hr>
  </header>
  <!-- スレッドエリア -->
  <div class="threadWrapper">
    <div class="childWrapper">
      <div class="threadTitle">
        <span>[タイトル]</span>
        <h1>2ちゃんねる掲示板をつくってみた</h1>
      </div>

      <section>
        <?php foreach($comment_array as $comment) :?>
        <article>
          <div class="wrapper">
            <div class="nameArea">
              <span>名前：</span>
              <p class="username"><?php echo $comment["username"] ?>
              </p>
              <time><?php echo $comment["post_date"] ?></time>
            </div>
            <p class="comment"><?php echo $comment["body"] ?></p>
          </div>
        </article>
        <?php endforeach ?>
        </section>

      <form class="formWrapper">
        <div>
          <input type="submit" value="書き込む">
          <lavel>:名前</lavel>
          <input type="text" name="username" class="username">
        </div>
        <div>
          <textarea class="commentTextArea" name="body"></textarea>
          </div>
      </form>

    </div>
  </div>
</body>
</html>