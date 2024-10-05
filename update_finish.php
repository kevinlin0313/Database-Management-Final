<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$session_user_id = $_SESSION['userid'];

#$id = $_POST['id'];
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
$ad = isset($_POST['ad']) ? 1 : 0;
$message = isset($_POST['message']) ? 1 : 0;

$fields_1= [
    'username'=> $name,
    'password'=> $pw,
    'email' => $email,
    'birthday'=> $birthday,
    'gender'=> $gender,
    'phone' => $phone,
    'ad'=> $ad,
    'message' => $message,
];
$fields_2= [
    'city'=> $address_city,
    'district'=> $address_district,
    'address' => $address,
    'postal_code'=> $postal_code,
];
$fields_3= [
    'city'=> $invoice_address_city,
    'district'=> $invoice_address_district,
    'address' => $invoice_address,
    'postal_code'=> $invoice_postal_code,
];
$fields_4= [
    'emergency_person'=> $emergency_person,
    'relation'=> $relation,
    'emergency_phone' => $emergency_phone,
];

// 過濾空白和未設置的值
$updates_1= [];
foreach ($fields_1 as $key => $value) {
    //if (!empty($value)) {
        $updates_1[] = "$key = '$value' ";
    //}
}
$updates_2= [];
foreach ($fields_2 as $key => $value) {
    if (!empty($value)) {
        $updates_2[] = "$key = '$value' ";
    }
}
$updates_3= [];
foreach ($fields_3 as $key => $value) {
    if (!empty($value)) {
        $updates_3[] = "$key = '$value' ";
    }
}
$updates_4= [];
foreach ($fields_4 as $key => $value) {
    if (!empty($value)) {
        $updates_4[] = "$key = '$value' ";
    }
}


// 檢查是否有需要更新的數據
if (count($updates_1) > 0) {
    $sql_1 = "UPDATE users SET " . implode(', ', $updates_1) . " WHERE user_id='$session_user_id'";
    //echo $sql_1;
    if(!mysqli_query($conn,$sql_1))
        echo 'Failed to update!';
}

if (count($updates_2) > 0) {
    $sql_2 = "UPDATE com_address SET " . implode(', ', $updates_2) . " WHERE user_id='$session_user_id'";
    //echo $sql_2;
    if(!mysqli_query($conn,$sql_2))
        echo 'Failed to update!';
}

if (count($updates_3) > 0) {
    $sql_3 = "UPDATE invoice_address SET " . implode(', ', $updates_3) . " WHERE user_id='$session_user_id'";
    //echo $sql_3;
    if(!mysqli_query($conn,$sql_3))
        echo 'Failed to update!';
}

if (count($updates_4) > 0) {
    $sql_4 = "UPDATE emergency SET " . implode(', ', $updates_4) . " WHERE user_id='$session_user_id'";
    //echo $sql_4;
    if(!mysqli_query($conn,$sql_4))
        echo 'Failed to update!';
}

echo '<meta http-equiv=REFRESH CONTENT=2;url=rental.php>';

?>