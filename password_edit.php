<?php
//1. HTML_STARTをインクルード
$title = "LOGIN";
include("include/html_start.php"); //HTML_HEAD
session_start();
include("include/func.php");
//sessionCheck();

//2. 認証後にSetされたSESSION変数を受け取り表示
$name =  "ユーザー：[ " . $_SESSION["user_name"] . " ]";
?>
<header>
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
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">アカウント管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="name_edit.php">プロフィール編集</a></li>
              <li><a href="password_edit.php">パスワード変更</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>
<div  class="container jumbotron" style="background:url(img/02.jpg); background-repeat:repeat-x; background-attachment:fixed;">
  <h2>パスワード変更</h2>
  <p><?=htmlEnc($name);?>　</p>
<form name="form1" class="form-horizontal" action="password_edit_act.php" method="post">

<!-- テキストボックス -->
  
    <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">古いパスワード</label>
          <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="古いパスワード" name="old_user_pass">
          </div>
        </div>
    <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">新しいパスワード</label>
          <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="新しいパスワード" name="new1_user_pass">
          </div>
        </div>
    <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">新しいパスワード(確認用)</label>
          <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="新しいパスワード(確認用)" name="new2_user_pass">
          </div>
        </div>


 <!-- ボタン -->
<div class="col-sm-offset-2 col-sm-10">
            <button   onclick="name_check()">登録</button>
          <!-- </div> -->
        </div>
</form>
</div>
<?php
//2. HTML_ENDをインクルード
include("include/html_end.php"); //HTML_FOOT
?>
