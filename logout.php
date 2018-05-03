<?php
session_start();

//SESSION初期化
$_SESSION = array();

//Cookieに保存してたS"essionIDの保存期間を過去にして破棄
if (isset($_COOKIE["chk_ssid"])) {
    setcookie(session_name(), '', time()-42000, '/');
}

//SESSION削除
session_destroy();

//処理後、index.phpへ
header("Location: login.php");
exit();

?>
