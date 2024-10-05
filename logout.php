<?php
session_start(); // 啟用 session
unset($_SESSION['username']);
session_unset(); // 清除 session 資料
session_destroy(); // 銷毀 session

// 重新導向到登入頁面
header("Location: login.php");
exit();
?>
