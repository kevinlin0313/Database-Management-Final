<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

session_start();
$user_id=$_SESSION['userid'];
$rental_id = $_SESSION['rental_id'];
$car_id = $_SESSION['car_id'];

#$sql = "UPDATE rental SET (userid, username, birthday, gender, password, email, phone, message, ad) VALUES ('$id', '$name', '$birthday', '$gender', '$pw', '$email', '$phone', '$ad', '$message')";
$sql = "UPDATE `vehicles` SET `car_status`='1' WHERE `car_id`='$car_id'";
if(mysqli_query($conn,$sql))
{	
    echo 'Finsh order successfully!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=rating.php>';
}
else
{
	echo 'Failed to finish order!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=rental.php>';
}

