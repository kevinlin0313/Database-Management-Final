<?php
session_start();
include("mysql_connect.inc.php");

$sql_vehicles = "SELECT * FROM vehicles";
$result_vehicles = mysqli_query($conn, $sql_vehicles);

echo "<h2>刪除車輛資訊</h2>";

echo "<table border='1'>
        <tr>
            <th>Select</th>
            <th>Car ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>License Plate</th>
            <th>Status</th>
            <th>Condition</th>
            <th>Type</th>
            <th>CC</th>
            <th>Location ID</th>
        </tr>";
while ($row_vehicles = mysqli_fetch_assoc($result_vehicles)) {
    echo "<tr>
            <td><a href='management_car_delete_process.php?car_id={$row_vehicles['car_id']}'>Delete</a></td>
            <td>{$row_vehicles['car_id']}</td>
            <td>{$row_vehicles['brand']}</td>
            <td>{$row_vehicles['model']}</td>
            <td>{$row_vehicles['license_plate']}</td>
            <td>" . ($row_vehicles['car_status'] ? 'Available' : 'Unavailable') . "</td>
            <td>{$row_vehicles['car_condition']}</td>
            <td>{$row_vehicles['car_type']}</td>
            <td>{$row_vehicles['cc']}</td>
            <td>{$row_vehicles['location_id']}</td>
          </tr>";
}
echo "</table>";
?>
