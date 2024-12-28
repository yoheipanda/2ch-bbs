<?php 
include_once("./app/database/connect.php");
$error_message = array();

if(isset($_POST["submitButton"])){
  if(empty($_POST["username"])){
    $error_message["username"] = "お名前を入力してください";
  }
  if(empty($_POST["body"])){
    $error_message["body"] = "コメントを入力してください";
  }
  if(empty($error_message)){
    $post_date = date("Y-m-d H:i:s"); // ここにセミコロンを追加
  
    $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, :body, :post_date);";
    $statement = $pdo->prepare($sql);
  
    // 値を正しくバインド
    $statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
    $statement->bindParam(":body", $_POST["body"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
  
    // 準備されたステートメントを実行
    $statement->execute();
  }
}
  
$comment_array = array();

$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement->fetchAll(PDO::FETCH_ASSOC); // 結果を連想配列として取得

// var_dump($comment_array);

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
  
  <?php if(isset($error_message)) : ?>
    <ul class="errorMessage">
      <?php foreach($error_message as $error) : ?>
      <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  
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
        <?php endforeach; ?>
        </section>

      <form class="formWrapper" method="POST">
        <div>
          <input type="submit" name="submitButton" value="書き込む">
          <label>:名前</label>
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