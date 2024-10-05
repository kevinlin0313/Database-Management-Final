<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$address_city = $_POST['address(city)'];
$address_district = $_POST['address(district)'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];

$invoice_address_city = $_POST['invoice_address(city)'];
$invoice_address_district = $_POST['invoice_address(district)'];
$invoice_address = $_POST['invoice_address'];
$invoice_postal_code = $_POST['invoice_postal_code'];

$emergency_person = $_POST['emergency_person'];
$relation = $_POST['relation'];
$emergency_phone = $_POST['emergency_phone'];
$ad = isset($_POST['ad']) ? 1 : 0; ;
$message = isset($_POST['message']) ? 1 : 0; ;



//Determine whether the account password is empty
//Confirm the correctness of the password input 
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
 //Add data into the database
	$sql_1 = "INSERT INTO users (user_id, username, birthday, gender, password, email, phone, message, ad) VALUES ('$id', '$name', '$birthday', '$gender', '$pw', '$email', '$phone', '$ad', '$message')";
	$sql_2 = "INSERT INTO com_address (user_id, city, district, postal_code, address) VALUES ('$id', $address_city, '$address_district', '$postal_code', '$address')";
	$sql_3 = "INSERT INTO invoice_address (user_id, city, district, postal_code, address) VALUES ('$id', $invoice_address_city, '$invoice_address_district', '$invoice_postal_code', '$invoice_address')";
	$sql_4 = "INSERT INTO emergency (user_id, emergency_person, relation, emergency_phone) VALUES ('$id', '$emergency_person', '$relation', '$emergency_phone')";

	if(mysqli_query($conn,$sql_1) && mysqli_query($conn,$sql_2) && mysqli_query($conn,$sql_3) && mysqli_query($conn,$sql_4))
	{
		echo 'added successfully!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
	}
	else
	{
		echo 'Failed to add!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
	}
}
else
{
	echo 'You do not have permission to view this page!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>