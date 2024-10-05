<?php
session_start();
include("mysql_connect.inc.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $license_plate = $_POST['license_plate'];
    $car_status = $_POST['car_status'];
    $car_condition = $_POST['car_condition'];
    $car_type = $_POST['car_type'];
    $cc = $_POST['cc'];
    $location_id = $_POST['location_id'];

    $sql = "UPDATE vehicles SET 
            brand='$brand', 
            model='$model', 
            license_plate='$license_plate', 
            car_status=$car_status, 
            car_condition='$car_condition', 
            car_type='$car_type', 
            cc='$cc', 
            location_id='$location_id' 
            WHERE car_id='$car_id'";
    if (mysqli_query($conn, $sql)) {
        echo '修改成功!';
    } else {
        echo '修改失敗! 錯誤信息: ' . mysqli_error($conn);
    }
    echo '<meta http-equiv=REFRESH CONTENT=2;url=management_vehicle.php>';
} else {
    $car_id = $_GET['car_id'];
    $sql = "SELECT * FROM vehicles WHERE car_id='$car_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <h2>修改車輛資訊</h2>
    <form action="management_car_update_process.php" method="post">
        <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
        Brand: <input type="text" name="brand" value="<?php echo $row['brand']; ?>"><br>
        Model: <input type="text" name="model" value="<?php echo $row['model']; ?>"><br>
        License Plate: <input type="text" name="license_plate" value="<?php echo $row['license_plate']; ?>"><br>
        Status: <select name="car_status">
            <option value="1" <?php if ($row['car_status']) echo 'selected'; ?>>Available</option>
            <option value="0" <?php if (!$row['car_status']) echo 'selected'; ?>>Unavailable</option>
        </select><br>
        Condition: <select name="car_condition">
            <option value="Brand new" <?php if ($row['car_condition'] == 'Brand new') echo 'selected'; ?>>Brand new</option>
            <option value="Medieval" <?php if ($row['car_condition'] == 'Medieval') echo 'selected'; ?>>Medieval</option>
        </select><br>
        Type: <select name="car_type">
            <option value="SUV" <?php if ($row['car_type'] == 'SUV') echo 'selected'; ?>>SUV</option>
            <option value="Hatchback" <?php if ($row['car_type'] == 'Hatchback') echo 'selected'; ?>>Hatchback</option>
            <option value="Sedan" <?php if ($row['car_type'] == 'Sedan') echo 'selected'; ?>>Sedan</option>
        </select><br>
        CC: <input type="text" name="cc" value="<?php echo $row['cc']; ?>"><br>
        Location ID: <input type="text" name="location_id" value="<?php echo $row['location_id']; ?>"><br>
        <input type="submit" value="修改">
    </form>
    <?php
}
?>
