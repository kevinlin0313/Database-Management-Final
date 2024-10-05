<?php
session_start();
include("mysql_connect.inc.php");

$car_id = $_GET['car_id'];

$sql = "DELETE FROM vehicles WHERE car_id='$car_id'";
if (mysqli_query($conn, $sql)) {
    echo '刪除成功!';
} else {
    echo '刪除失敗! 錯誤信息: ' . mysqli_error($conn);
}
echo '<meta http-equiv=REFRESH CONTENT=2;url=management_vehicle.php>';
?>
