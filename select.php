<?php

// funcs.phpを読み込む
require_once('funcs.php');

// DB接続
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_kadai_an_table");
$status = $stmt->execute();

//データ表示
$view="";
if ($status==false) {
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
}else{
   while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //GETデータ送信リンク作成 
    $view .= '<p>';
    $view .= '<a href="detail.php?id=' . $result['id'] . '">';
    // 非開示の個人情報は入れない
    $view .= '【' . h($result['name']) . '】' . h($result['category']) . '｜' . h($result['sns']) . '｜' . h($result['place']) . '｜' . h($result['description']);
    $view .= '</a>';
    $view .= '<a href="delete.php?id=' . $result['id'] . '">';
    $view .= ' [削除] ';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録ありがとうございました</title>
<link rel="stylesheet" href="/gs_kadai_php3/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="input.php">戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h1>登録ありがとうございました！</h1>
<div>
    <div class="container jumbotron"><?= $view ?></div>
  </div>
<!-- Main[End] -->

</body>
</html>
