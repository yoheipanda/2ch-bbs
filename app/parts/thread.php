 <?php 

include_once("./app/database/connect.php");

$error_message = array();

if(isset($_POST["submitButton"])){

  // お名前入力チェック
  if(empty($_POST["username"])){
    $error_message["username"] = "お名前を入力してください";
  }else{
    //エスケープ処理
    $escaped["username"] = htmlspecialchars($_POST["username"],ENT_QUOTES,"UTF-8");
  }

  // コメント入力チェック
  if(empty($_POST["body"])){
    $error_message["body"] = "コメントを入力してください";
  }else{
    //エスケープ処理
    $escaped["body"] = htmlspecialchars($_POST["body"],ENT_QUOTES,"UTF-8");
  }

  if(empty($error_message)){
    $post_date = date("Y-m-d H:i:s"); // ここにセミコロンを追加
  
    $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, :body, :post_date);";
    $statement = $pdo->prepare($sql);
  
    // 値をセットする
    $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
    $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
    // 準備されたステートメントを実行
    $statement->execute();
  }
}
  
$comment_array = array();

// コメントデータをテーブルから取得してくる
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement; // 結果を連想配列として取得

// var_dump($comment_array->fetchAll());
?>
 
  <div class="threadWrapper">
    <div class="childWrapper">
      <div class="threadTitle">
        <span>[タイトル]</span>
        <h1>2ちゃんねる掲示板をつくってみた</h1>
      </div>
      <?php include("commentSection.php"); ?>
      <?php include("commentForm.php"); ?>

    </div>
  </div>