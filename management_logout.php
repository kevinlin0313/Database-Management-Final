<?php
// 啟用 session
session_start();

// 檢查是否已登入，如果未登入則導向回到登入頁面
if (!isset($_SESSION['manager_id'])) {
    header("Location: login.php");
    exit;
}

// 清除所有 session 變數
$_SESSION = array();

// 如果使用的是基於 cookie 的 session，則清除 session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 銷毀 session
session_destroy();

// 導向到登入頁面
header("Location: management_login.php");
exit;
?>
