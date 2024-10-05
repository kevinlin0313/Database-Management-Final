<?php
session_start();
include("mysql_connect.inc.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = isset($_POST['message']) ? 1 : 0;
$ad = isset($_POST['ad']) ? 1 : 0;
$address_city = $_POST['address(city)'];
$address_district = $_POST['address(district)'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];

$invoice_address_city = $_POST['invoice_address(city)'];
$invoice_address_district = $_POST['invoice_address(district)'];
$invoice_address = $_POST['invoice(address)'];
$invoice_postal_code = $_POST['invoice_postal_code'];

$emergency_person = $_POST['emergency_person'];
$relation = $_POST['relation'];
$emergency_phone = $_POST['emergency_phone'];

if ($userid && $username && $birthday && $gender && $password && $email && $phone) {
    // Insert user data into 'users' table
    $sql = "INSERT INTO users (user_id, username, birthday, gender, password, email, phone, message, ad) VALUES ('$userid', '$username', '$birthday', '$gender', '$password', '$email', '$phone', $message, $ad)";
    if (mysqli_query($conn, $sql)) {
        // Insert user's common address into 'com_address' table
        $sql_com_address = "INSERT INTO com_address (user_id, city, district, postal_code, address) VALUES ('$userid', '$address_city', '$address_district', '$postal_code', '$address')";
        mysqli_query($conn, $sql_com_address);

        // Insert user's invoice address into 'invoice_address' table
        $sql_invoice_address = "INSERT INTO invoice_address (user_id, city, district, postal_code, address) VALUES ('$userid', '$invoice_address_city', '$invoice_address_district', '$invoice_postal_code', '$invoice_address')";
        mysqli_query($conn, $sql_invoice_address);

        // Insert user's emergency contact into 'emergency' table
        $sql_emergency = "INSERT INTO emergency (user_id, emergency_person, relation, emergency_phone) VALUES ('$userid', '$emergency_person', '$relation', '$emergency_phone')";
        mysqli_query($conn, $sql_emergency);

        echo '新增成功!';
    } else {
        echo '新增失敗! 錯誤信息: ' . mysqli_error($conn);
    }
} else {
    echo '輸入資料有誤，請重新輸入!';
}

echo '<meta http-equiv=REFRESH CONTENT=2;url=management_customer.php>';
?>
