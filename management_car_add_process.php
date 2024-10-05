<?php
session_start();
include("mysql_connect.inc.php");

$car_id = $_POST['car_id'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$license_plate = $_POST['license_plate'];
$car_status = $_POST['car_status'];
$car_condition = $_POST['car_condition'];
$car_type = $_POST['car_type'];
$cc = $_POST['cc'];
$location_id = $_POST['location_id'];

if ($car_id && $brand && $model && $license_plate && $cc && $location_id) {
    $sql = "INSERT INTO vehicles (car_id, brand, model, license_plate, car_status, car_condition, car_type, cc, location_id) 
            VALUES ('$car_id', '$brand', '$model', '$license_plate', $car_status, '$car_condition', '$car_type', '$cc', '$location_id')";
    if (mysqli_query($conn, $sql)) {
        echo '新增成功!';
    } else {
        echo '新增失敗! 錯誤信息: ' . mysqli_error($conn);
    }
} else {
    echo '輸入資料有誤，請重新輸入!';
}
echo '<meta http-equiv=REFRESH CONTENT=2;url=management_vehicle.php>';
?>
