<?php
  $thread_array = array();
  
  // コメントデータをテーブルから取得してくる
  $sql = "SELECT * FROM thread";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  
  $thread_array = $statement; // 結果を連想配列として取得
  
  //DB接続を切る
  $pdo = null;
  $statement = null;
?>