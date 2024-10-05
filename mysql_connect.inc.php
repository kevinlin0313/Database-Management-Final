<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//database settings
//database location
$db_server = "localhost";
//database name
$db_name = "final";
//database administrator account
$db_user = "root";
//database manager password
$db_passwd = "03130606";

//connect to database
$conn = new mysqli ($db_server, $db_user, $db_passwd);
if(!@mysqli_connect($db_server, $db_user, $db_passwd))
	die("Unable to connect to the database");

//database connection adopts UTF8
mysqli_query("SET NAMES utf8");

//select database
if(!@mysqli_select_db($conn,$db_name))
	die("Unable to use database");

?>

