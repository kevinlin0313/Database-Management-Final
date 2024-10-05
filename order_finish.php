<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

session_start();
$rental_id = $_SESSION['rental_id'];
$car_id = $_SESSION['car_id'];
$user_id=$_SESSION['userid'];

$stars =$_POST['rating'];
$satisfaction = isset($_POST['expectation']) ? 1 : 0;;
$recommend = isset($_POST['recommend']) ? 1 : 0;;
$feedback = isset($_POST['dissatisfied']) ? $_POST['dissatisfied'] : '';
$recommendation = isset($_POST['explain']) ? $_POST['explain'] : '';


$sql = "INSERT INTO rating (rental_id, user_id, car_id, stars, satisfaction, recommend, feedback, recommendation) VALUES ('$rental_id', '$user_id', '$car_id', '$stars', '$satisfaction', '$recommend', '$feedback', '$recommendation')";
if(mysqli_query($conn,$sql))
{	
    echo 'Finsh order successfully!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=rental.php>';
}
else
{
	echo 'Failed to finish order!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=rental.php>';
}

