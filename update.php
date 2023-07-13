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
$id = $_POST['id']; // 追加

// funcs.phpを読み込む
require_once('funcs.php');

// DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
  

//データ編集SQL作成
// UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;
$stmt = $pdo->prepare( 'UPDATE gs_kadai_an_table
                        SET name = :name,
                            category = :category,
                            sns = :sns,
                            email = :email,
                            place = :place,
                            description = :description,
                            pass = :pass
                        WHERE id = :id;');

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':sns', $sns, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); // 数値の場合 PDO::PARAM_INT

$status = $stmt->execute(); //実行

//データ登録処理後
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select.php');
    exit();
}