<?php
$insert_error="";
if(isset($_GET["er"]) && $_GET["er"]=="1"){
 $insert_error = '<p id="err">全て入力して、送信してください。</p>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ツイート</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}#err{color:red;font-size:36px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
  <?=$insert_error?>
   <fieldset>
    <legend>ツイートする</legend>
     <label><textArea name="tweet" rows="4" cols="20" required></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
