<?php
session_start();

// 生成一個隨機數
$random_num = md5(random_bytes(64));
$captcha_code = substr($random_num, 0, 6);
$_SESSION['captcha'] = $captcha_code;

// 創建圖片，設定背景顏色和文字顏色
header('Content-type: image/png');
$image = imagecreate(120, 30);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 255, 255);
imagestring($image, 5, 5, 5, $captcha_code, $text_color);
imagepng($image);
imagedestroy($image);
?>
