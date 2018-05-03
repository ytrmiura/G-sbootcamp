<?php



session_start();
include("include/func.php");

$rs = array(
		"text" => htmlspecialchars($_GET['text'],ENT_QUOTES,"utf-8"),
		"user_name" => htmlspecialchars($_GET['user_name'],ENT_QUOTES,"utf-8"),
		"user_id" => htmlspecialchars($_GET['user_id'],ENT_QUOTES,"utf-8"),
		"image_num" =>htmlspecialchars($_GET['image_num'],ENT_QUOTES,"utf-8")
	);



	$pdo = db();
  //2. DB文字コードを指定(固定)
	$stmt = $pdo->query('SET NAMES utf8');

  //３．データ登録SQL作成
	$stmt = $pdo->prepare("INSERT INTO tweets(id, user_id, user_name, tweet, indate, image_num )VALUES(NULL, :user_id, :user_name, :tweet, sysdate(), :image_num)");
	$stmt->bindValue(':user_id', $rs["user_id"]);
	$stmt->bindValue(':user_name', $rs["user_name"]);
	$stmt->bindValue(':tweet', $rs["text"]);
	$stmt->bindValue(':image_num', $rs["image_num"]);
	$status = $stmt->execute();

	 if($status==false){
	    //Errorの場合$status=falseとなり、エラー表示
	    echo $rs["user_name"];
	    echo $rs["user_id"];
	    echo $rs["text"];
	    echo "SQLエラー";
	    return $rs;
	    exit;
	  }

	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($rs);