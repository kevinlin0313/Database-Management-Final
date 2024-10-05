<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
 //新增資料進資料庫語法
	$sql = "INSERT INTO managers (manager_id, manager_passwords) VALUES ('$id', '$pw')";
	if(mysqli_query($conn,$sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=management_login.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=management_login.php>';
	}
}
