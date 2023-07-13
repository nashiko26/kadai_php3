<?php

// POSTデータ取得
$name = $_POST['name'];
$category = $_POST['category'];
$sns = $_POST['sns'];
$email = $_POST['email'];
// $eventdate = $_POST['eventdate'];
$place = $_POST['place'];
$description = $_POST['description'];
$pass = $_POST['pass'];

// funcs.phpを読み込む
require_once('funcs.php');

// DB接続
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ登録SQL作成
$stmt = $pdo->prepare(
    "INSERT INTO
        gs_kadai_an_table(
            name, category, sns, email, place, description, pass
            )
        VALUES (
            :name, :category, :sns, :email, :place, :description, :pass
            );"
);

//バインド変数
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':sns', $sns, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':eventdate', $eventdate, PDO::PARAM_STR); // 入らない…？
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

//実行
$status = $stmt->execute();
// $stmt = $pdo->prepare("SELECT * FROM gs_kadai_an_table");
// $status = $pdo->prepare("SELECT * FROM post");

//データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．登録が成功した場合の処理
  header('Location: select.php');
}

?>