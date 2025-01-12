<?php
  $comment_array = array();
  
  // コメントデータをテーブルから取得してくる
  $sql = "SELECT * FROM comment";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  
  $comment_array = $statement; // 結果を連想配列として取得
  
  // var_dump($comment_array->fetchAll());
?>