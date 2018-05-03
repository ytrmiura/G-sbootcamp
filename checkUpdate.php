<?php



session_start();
include("include/func.php");




	$pdo = db();
	$stmt = $pdo->query('SET NAMES utf8');
	$stmt = $pdo->prepare("SELECT * FROM tweets ORDER BY id DESC limit 1");
	$flag = $stmt->execute();




	//データ表示
	$view="";
	if($flag==false){
	  $view = "SQLエラー";
	}else{
	  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
	    $view =$result;}
	}

	
		//一つ前に描画したオブジェクトと最新のデータが同じだったらスキップ
	if($_GET["old_id"]==$view["id"]){
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode("false");
		exit(1);
	}else if($_GET["old_id"]==null){	//まだオブジェクトを一つも描画していなかったらスキップ
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($view["id"]);
		exit(1);
	}


	$old_view = $view;

	$temp_old =2;
	$temp = 0;

	
			$rs = array(
				"text" =>htmlEnc($view['tweet']),
				"user_name" =>htmlEnc($view['user_name']) ,//htmlspecialchars($_SESSION["user_name"];,ENT_QUOTES,"utf-8"),
				"id" => htmlEnc($view['id']),//htmlspecialchars($data["user_id"],ENT_QUOTES,"utf-8")
				"image_num" => htmlEnc($view['image_num'])
			);

			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($rs);
		

	













//   //1. POSTデータ取得（）
 
  

//   //2. DB接続します
//   $pdo = new PDO('mysql:dbname=gs_db_tweet;host=localhost','root','ym941214dec');

//   //2. DB文字コードを指定(固定)
//   $stmt = $pdo->query('SET NAMES utf8');

//   //３．データ登録SQL作成
//   $stmt = $pdo->prepare("INSERT INTO tweets(id, user_id, user_name, tweet, indate, view_flag )VALUES(NULL, :user_id, :user_name, :tweet, sysdate(), 5)");
//   $stmt->bindValue(':user_id', $rs["user_id"]);
//   $stmt->bindValue(':user_name', $rs["user_name"]);
//   $stmt->bindValue(':tweet', $rs["text"]);
//   $status = $stmt->execute();










//   //４．データ登録処理後
//   if($status==false){
//     //Errorの場合$status=falseとなり、エラー表示
//     echo $rs["user_name"];
//     echo $rs["user_id"];
//     echo $rs["text"];
//     echo "SQLエラー";
//     exit;
//   }else{
//     //５．index.phpへリダイレクト
//     header('Content-Type: application/json; charset=utf-8');
// echo json_encode($rs);
//   }














