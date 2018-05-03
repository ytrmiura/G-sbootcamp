<?php
session_start();
include('include/func.php');
//POST値チェック
if(!isset($_POST["old_user_pass"]) ||
   !isset($_POST["new1_user_pass"]) || 
   !isset($_POST["new2_user_pass"])
   ){
	header("Location: password_edit.php");
}else if($_POST["new1_user_pass"] != $_POST["new2_user_pass"]){
	header("Location: password_edit.php");
}


//DB処理
$pdo = db();
$stmt = $pdo->query('SET NAMES utf8');

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->bindValue(':id', $_SESSION["user_id"]);
$res = $stmt->execute();
$val = $stmt->fetch();

if( $val["user_pass"] == $_POST["old_user_pass"]){

	$stmt = $pdo->query('SET NAMES utf8');

	$stmt = $pdo->prepare("UPDATE users SET user_pass = :new_pass WHERE id=:id");
	$stmt->bindValue(':id', $val["id"]);
	$stmt->bindValue(':new_pass',$_POST["new1_user_pass"]);
	$res = $stmt->execute();

header("Location: select.php");
	

}else{
  //logout処理を経由して全画面へ
  header("Location: password_edit.php");
}
//exit();


