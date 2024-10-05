<?php session_start(); ?>
<!-- The above syntax is to enable session, this syntax should be placed at the front of the page -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//connect database
//as long as this page needs to connect to MySQL, it must be included
include("mysql_connect.inc.php");
$name = $_POST['name'];
$pw = $_POST['pw'];
//search database data
$sql = "SELECT * FROM users where username = '$name'";
$result = mysqli_query($conn,$sql);
$row = @mysqli_fetch_row($result);
//Determine whether the account number and password are null
//And whether there is this member in the MySQL database
if( !isset($_POST['captcha']) ||  $_POST['captcha'] != $_SESSION['captcha'])
{
	echo 'Captcha failed!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
else if($name == null || $pw == null || $row[1] != $name || $row[4] != $pw)
{
	echo 'Login failed!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	
}
else
{
	// Write the account into the session to facilitate user authentication
	$_SESSION['userid'] = $row[0];
	echo 'Sign in suceesfully!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=rental.php>';
}
?>
