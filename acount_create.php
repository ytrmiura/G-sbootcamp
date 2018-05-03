<?php
//1. HTML_STARTをインクルード
$title = "LOGIN";
include("include/html_start.php"); //HTML_HEAD
?>


<!-- Custom styles for this template -->
<style>
body {
  padding-bottom: 20px;
}
</style>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php"></a>
    <div id="navbar" class="navbar-collapse collapse">
      
    </div><!--/.navbar-collapse -->
  </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" style="background:url(img/02.jpg); background-repeat:repeat-x; background-attachment:fixed;">
  <div class="container">
    <h2>新規登録</h2>
    <!-- <p> <form class="form-horizontal" role="form"　action="acount_create_act.php" method="post"> --><p><form class="form-horizontal" action="acount_create_act.php" method="post" name="form1">

        <!-- 
          form-groupをrowとして使う例
        -->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">姓</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="inputEmail3" placeholder="姓" name="first_name">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">名</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="inputEmail3" placeholder="名" name="last_name">
          </div>
        </div>

        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
          <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="パスワード" name="user_pass">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">ユーザーネーム</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="ユーザーネーム" name="name">
            <p class="help-block" style="font-size:3px;">※アルファベットのみ10字以内</p>
          </div>
        </div>
        <!-- <div class="form-group"> -->
          <div class="col-sm-offset-2 col-sm-10">
            <button   onclick="name_check()">登録</button>
          <!-- </div> -->
        </div>
      </form>
  </div>
</div>




</body>
</html>
<!--   <fieldset>
    <legend>新規登録</legend>
    <p><label>名前（姓名）</label><input type="text" size = "10"name="first_name">
      <input type="text" size = "10" name="last_name" ></p>
    <p><label>パスワード　</label><input type="password" name="user_pass"　></p>
     <p><label>ユーザーネーム(表示名)　</label><input type="text" name="name"　></p>

  </fieldset> -->

 <!-- ボタン -->
<!--   <fieldset>
    <legend></legend>
    <p><input type="submit" value="登録"></p>
    <a href="login.php">戻る</a>
  </fieldset>

</form>
</div> -->
<?php
//2. HTML_ENDをインクルード
include("include/html_end.php"); //HTML_FOOT
?>
