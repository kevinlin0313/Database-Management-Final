<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h2>新增車輛</h2>
<form action="management_car_add_process.php" method="post">
    Car ID: <input type="text" name="car_id"><br>
    Brand: <input type="text" name="brand"><br>
    Model: <input type="text" name="model"><br>
    License Plate: <input type="text" name="license_plate"><br>
    Status: <select name="car_status">
        <option value="1">Available</option>
        <option value="0">Unavailable</option>
    </select><br>
    Condition: <select name="car_condition">
        <option value="Brand new">Brand new</option>
        <option value="Medieval">Medieval</option>
    </select><br>
    Type: <select name="car_type">
        <option value="SUV">SUV</option>
        <option value="Hatchback">Hatchback</option>
        <option value="Sedan">Sedan</option>
    </select><br>
    CC: <input type="text" name="cc"><br>
    Location ID: <input type="text" name="location_id"><br>
    <input type="submit" value="新增">
</form>
