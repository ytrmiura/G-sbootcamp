<?php
session_start();
include('include/func.php');
//POST値チェック
// if(!isset($_POST["old_user_pass"]) ||
//    !isset($_POST["new1_user_pass"]) || 
//    !isset($_POST["new2_user_pass"])
//    ){
// 	header("Location: password_edit.php");
// }else if($_POST["new1_user_pass"] != $_POST["new2_user_pass"]){
// 	header("Location: password_edit.php");
// }


//DB処理
$pdo = db();
$stmt = $pdo->query('SET NAMES utf8');

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->bindValue(':id', $_SESSION["user_id"]);
$res = $stmt->execute();
$val = $stmt->fetch();

$new_first_name = $val["first_name"];
$new_last_name = $val["last_name"];
$new_name = $val["name"];

echo $new_first_name;
echo $new_last_name;
echo $new_name;



if(!empty($_POST["first_name"])){
	$new_first_name = $_POST["first_name"];
}
if(!empty($_POST["last_name"])){
	$new_last_name = $_POST["last_name"];
}
if(!empty($_POST["name"])){
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
		$new_name = $_POST["name"];
	}else{
		header("Location: name_edit.php");
		exit();
	}
}

echo $new_first_name;
echo $new_last_name;
echo $new_name;



// if( $val["user_pass"] == $_POST["old_user_pass"]){

	$stmt = $pdo->query('SET NAMES utf8');

	$stmt = $pdo->prepare("UPDATE users SET first_name=:new_first_name,last_name=:new_last_name,name=:new_name WHERE id=:id");
	$stmt->bindValue(':new_first_name',$new_first_name);
	$stmt->bindValue(':new_last_name',$new_last_name);
	$stmt->bindValue(':new_name',$new_name);
	$stmt->bindValue(':id', $val["id"]);

	$res = $stmt->execute();

if($res == false){  //logout処理を経由して全画面へ
  header("Location: name_edit.php");
}else{
	$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->bindValue(':id', $_SESSION["user_id"]);
	$res = $stmt->execute();
	$val = $stmt->fetch();
	loginSessionSet($val);
header("Location: select.php");
	}


//exit();


