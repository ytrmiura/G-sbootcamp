<?php
session_start();
include('include/func.php');
//POST値チェック
if(!isset($_POST["first_name"]) || !isset($_POST["last_name"]) || !isset($_POST["user_pass"])){
  exit;
}
//DB処理
$pdo = db();
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("SELECT * FROM users WHERE first_name=:first_name AND last_name=:last_name AND user_pass=:user_pass");
$stmt->bindValue(':first_name', $_POST["first_name"]);
$stmt->bindValue(':last_name', $_POST["last_name"]);
$stmt->bindValue(':user_pass', $_POST["user_pass"]);

$res = $stmt->execute();

//抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //データが1レコードとわかってる場合こちらを使用

//該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  loginSessionSet($val);
  header("Location: select.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: logout.php");
}
//exit();


