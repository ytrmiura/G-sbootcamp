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
    <div id="gnavi" class="collapse navbar-collapse">
    
     

        <ul class="nav navbar-nav navbar-right">
          <li><a href="about.php">About</a></li>
          <li><a href="introduce.php">Introduce</a></li>
      </div>
    </nav>






<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" style="background:url(img/02.jpg)">
  <div class="container">
    <h1>Welcome to BubbleChat</h1>
    <p>下からログイン！ 初めての方は新規登録してね</p>

     <!-- <div id="navbar" class="navbar-collapse collapse"> -->
      <form class="navbar-form" action="login_act.php" method="post">
        <div class="form-group">
          <input type="text" name= "first_name" placeholder="姓" class="form-control">
        </div>
        <div class="form-group">
          <input type="text"  name= "last_name" placeholder="名" class="form-control">
        </div>
        <div class="form-group">
          <input type="password" name= "user_pass" placeholder="パスワード" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">ログイン</button>
      </form>
    <!-- </div>/.navbar-collapse  -->
    <p><a class="btn btn-primary btn-lg" href="acount_create.php" role="button">新規登録 &raquo;</a></p>
  </div>
</div>




</body>
</html>