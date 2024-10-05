<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

if (!isset($_SESSION['manager_id'])) {
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
    exit;
}

echo '<a href="management_logout.php">登出</a> <br><br>';
echo '<a href="management_customer.php">Customer</a>  <br><br>';
echo '<a href="management_vehicle.php">Vehicle</a>  <br><br>';
echo '<a href="management_rating.php">Rating</a>  <br><br>';
echo '<a href="management_order.php">Order</a>  <br><br>';
echo '<a href="management_revenue.php">Revenue</a>  <br><br>';
?>

