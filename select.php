<?php

$insert_error="";
if(isset($_GET["er"]) && $_GET["er"]=="1"){
 $insert_error = '<p id="err">全て入力して、送信してください。</p>';
}


/************************************************************
 *  ログイン認証OKの場合表示
 ************************************************************/
//1. SESSION開始
session_start();
include("include/func.php");
//sessionCheck();

//2. 認証後にSetされたSESSION変数を受け取り表示
$name =  "ユーザー：[ " . $_SESSION["user_name"] . " ]";

//3. 管理者FLGを表示
// if( $_SESSION["kanri_flg"]==1 ) {
//   $admin  =  "権限：管理者";
//   $admin .=  "管理者メニュー";
// }else if( $_SESSION["kanri_flg"]==0 ){
//   $admin = "権限：一般";
// }
// function getData(){

// //***************************************************************
// // 7回目授業のselect.php データ一覧を取得し、表示するロジックをここに記述
// //***************************************************************
// $pdo = db();
// $stmt = $pdo->query('SET NAMES utf8');
// $stmt = $pdo->prepare("SELECT * FROM tweets ORDER BY id DESC limit 1");
// $flag = $stmt->execute();



// //データ表示
// $view="";
// if($flag==false){
//   $view = "SQLエラー";
// }else{
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
// }

// return $result;
// }



// function getUpdatedData() {
//   $data = getData();
//   $temp = $data;
//   while ($temp === $data) {
//     $temp = getData();
//     sleep(1);
//   }
//   return $temp;
// }

// if (isset($_GET['mode'])){
//   $data = getUpdatedData();

// }





//1. HTML_STARTをインクルード
$title = "データ一覧";
include("include/html_start.php"); //HTML_HEAD
?>


<!-- Head[Start] -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$title?></title>
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<style>div{padding: 10px;font-size:16px;}</style>
<!-- <meta http-equiv="Refresh" content="1"> -->
</head>
<body >


  <!-- <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="logout.php">LOGOUT</a>
      <a class="navbar-brand" href="select.php">データ一覧</a>
      <a class="navbar-brand" href="acount_edit.php">アカウント編集</a>
    </div>
  </nav> -->

  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    <div id="gnavi" class="collapse navbar-collapse">
    
     

        <ul class="nav navbar-nav navbar-right">
          <li><a href="select.php">メインページ</a></li>
          <li><a href="logout.php">ログアウト</a></li>
          <li ><a href="#" class="dropdown-toggle" data-toggle="dropdown">アカウント管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="name_edit.php">プロフィール編集</a></li>
              <li><a href="password_edit.php">パスワード変更</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>



  

<!-- Head[End] -->

<!-- Main[Start] -->
  <div class="container jumbotron" style="background:url(img/02.jpg); background-repeat:repeat-x; background-attachment:fixed; padding-top:0px;">
 <div>
   <p><?=htmlEnc($name);?>　</p>
   <!-- <p>test</p> -->
   <p><?=$insert_error;?></p>
  </div>




  <!-- <ul class="nav nav-tabs">
  <li class="active"><a href="#tab1" data-toggle="tab">Home</a></li>
  <li><a href="#tab2" data-toggle="tab">Profile</a></li>
  <li><a href="#tab3" data-toggle="tab">Messages</a></li>
</ul>
 
<div class="tab-content">
  <div class="tab-pane active" id="tab1">-->
  <?php include('canvas.php');?>
 <!--  </div> 
  <div class="tab-pane" id="tab2"></div>
   <div class="tab-pane" id="tab3"></div>
</div>  -->
  </div>
<!-- Main[End] -->
<?php
//2. HTML_ENDをインクルード

include("include/html_end.php"); //HTML_FOOT

 // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
 //    if($result['view_flag']<=0){
 //      continue;
 //    }

 //      $stmt2 = $pdo->prepare("UPDATE tweets SET view_flag =:view_flag WHERE id=:id");
 //      $stmt2->bindValue(':view_flag', $result['view_flag']-1);
 //      $stmt2->bindValue(':id', $result['id']);
 //      $flag2 = $stmt2->execute();
 //  }


?>




