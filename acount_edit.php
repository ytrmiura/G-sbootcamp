<?php
//1. HTML_STARTをインクルード
$title = "LOGIN";
include("include/html_start.php"); //HTML_HEAD

session_start();
include("include/func.php");
//sessionCheck();

//2. 認証後にSetされたSESSION変数を受け取り表示
$name =  $_SESSION["user_id"]."名前： " . $_SESSION["user_name"] . "";




?>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="logout.php">LOGOUT</a>
      <a class="navbar-brand" href="select.php">データ一覧</a>
      <!-- メニューを追加 -->
    </div>
  </nav>
</header>
<div  class="container jumbotron">
<p><?=htmlEnc($name);?>　</p>
<form name="form1" action="acount_edit_act.php" method="post">

<!-- テキストボックス -->
  <fieldset>
    <legend>アカウント管理</legend>
    <p><label><a href="name_edit.php">プロフィール編集</a></label></p> 
    <p><label><a href="password_edit.php">パスワード変更</a></label></p>

  </fieldset>

 <!-- ボタン -->
  <fieldset>
    <legend></legend>
    <p><input type="submit" value="登録"></p>
    <a href="select.php">戻る</a>
  </fieldset>

</form>
</div>
<?php
//2. HTML_ENDをインクルード
include("include/html_end.php"); //HTML_FOOT
?>
