<?php
session_start();
include('include/func.php');
//POST値チェック
if(empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["user_pass"])|| empty($_POST["name"])){
  header("Location: acount_create.php");;
}


$pdo = db();
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("SELECT * FROM users WHERE user_pass=:user_pass");
$stmt->bindValue(':user_pass', $_POST["user_pass"]);
// $stmt->bindValue(':name', $_POST["name"]);
$res = $stmt->execute();
// $val = $stmt->fetch();
$view='';
if($res==false){ //$flag=falseが⼊っていればエラー􀀁
$view = "SQLエラー";
}else{
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
$view .= '<p>'. $result['id'] . ',' . $result['user_pass'] . '</p>';
}
}

echo "パスチェック</br>";
var_dump($res);
// echo $val["id"];
var_dump($view);
echo $view.'</br>';

if($view ==''){

	$pdo = db();
	$stmt = $pdo->query('SET NAMES utf8');
	$stmt = $pdo->prepare("SELECT * FROM users WHERE name=:name");
	$stmt->bindValue(':name', $_POST["name"]);

	$res = $stmt->execute();
	$view = "";
	if($res==false){ //$flag=falseが⼊っていればエラー􀀁
	$view = "SQLエラー";
	}else{
	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$view .= '<p>'. $result['id'] . ',' . $result['name'] . '</p>';
	}
	}

	echo "名前チェック</br>";
	var_dump($res);
	// echo $val["id"];
	var_dump($view);
	echo $view.'</br>';


	if($view ==''){



//DB処理
		$pdo = db();
		$stmt = $pdo->query('SET NAMES utf8');
		$stmt = $pdo->prepare("INSERT INTO users(id, first_name, last_name, name, user_pass)VALUES(NULL, :first_name, :last_name, :name, :user_pass)");
		$stmt->bindValue(':first_name', $_POST["first_name"]);
		$stmt->bindValue(':last_name', $_POST["last_name"]);
		$stmt->bindValue(':user_pass', $_POST["user_pass"]);
		$stmt->bindValue(':name', $_POST["name"]);
		$res = $stmt->execute();

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
		  header("Location: acount_create.php");
		}
	}else{
		header("Location:acount_create.php");
	}
}else{
	header("Location:acount_create.php");
}


