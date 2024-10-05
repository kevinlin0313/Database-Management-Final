<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #003366;
        }
        form {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        label {
            margin-right: 10px;
            color: #003366;
            font-size: 14px;
        }
        select, input[type="submit"] {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        select {
            min-width: 120px;
        }
        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        input[type="submit"] {
            background-color: #003366;
            color: #fff;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #005bb5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #e0e0e0;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #003366;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <title>Vehicle</title>
</head>
<body>
    <h2>搜尋車輛狀態</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="brand">品牌:</label>
            <select name="brand">
                <option value="">選擇品牌</option>
                <?php
                    include("mysql_connect.inc.php");
                    $brand_sql = "SELECT DISTINCT brand FROM vehicles";
                    $brand_result = $conn->query($brand_sql);
                    if ($brand_result->num_rows > 0) {
                        while ($brand_row = $brand_result->fetch_assoc()) {
                            echo "<option>{$brand_row['brand']}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="model">車型:</label>
            <select name="model">
                <option value="">選擇車型</option>
                <?php
                    include("mysql_connect.inc.php");
                    $model_sql = "SELECT DISTINCT model FROM vehicles";
                    $model_result = $conn->query($model_sql);
                    if ($model_result->num_rows > 0) {
                        while ($model_row = $model_result->fetch_assoc()) {
                            echo "<option>{$model_row['model']}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="location_name">地點:</label>
            <select id="location_name" name="location_name">
                <option value="">選擇地點</option>
                <?php
                    include("mysql_connect.inc.php");
                    $location_sql = "SELECT location_id, location_name FROM location";
                    $location_result = $conn->query($location_sql);
                    if ($location_result->num_rows > 0) {
                        while ($location_row = $location_result->fetch_assoc()) {
                            echo "<option value='{$location_row['location_id']}'>{$location_row['location_name']}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <input type="submit" value="搜尋">
    </form>
    <hr>
    <?php
        $sql = "SELECT v.*, l.location_name 
                FROM vehicles v
                JOIN location l ON v.location_id = l.location_id";
        $searchConditions = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $location_id = $_POST['location_name'];
            $conditions = [];
            if (!empty($brand)) {
                $conditions[] = "v.brand = '$brand'";
                $searchConditions[] = "品牌: $brand";
            }
            if (!empty($model)) {
                $conditions[] = "v.model = '$model'";
                $searchConditions[] = "車型: $model";
            }
            if (!empty($location_id)) {
                $location_name_sql = "SELECT location_name FROM location WHERE location_id = '$location_id'";
                $location_name_result = $conn->query($location_name_sql);
                $location_name_row = $location_name_result->fetch_assoc();
                $location_name = $location_name_row['location_name'];
                $conditions[] = "v.location_id = '$location_id'";
                $searchConditions[] = "地點: $location_name";
            }
            if (count($conditions) > 0) {
                $where_clause = implode(' AND ', $conditions);
                $sql .= " WHERE $where_clause";
            }
        }
        $result = $conn->query($sql);
        if (count($searchConditions) > 0) {
            echo "<h3>搜尋條件：</h3>";
            echo "<p>" . implode(', ', $searchConditions) . "</p>";
        }
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>車輛ID</th>
                        <th>品牌</th>
                        <th>車型</th>
                        <th>車牌號碼</th>
                        <th>狀態</th>
                        <th>車況</th>
                        <th>類型</th>
                        <th>CC數</th>
                        <th>地點</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                $car_status = $row['car_status'] == 1 ? "可用" : "不可用";
                echo "<tr>
                        <td>{$row['car_id']}</td>
                        <td>{$row['brand']}</td>
                        <td>{$row['model']}</td>
                        <td>{$row['license_plate']}</td>
                        <td>{$car_status}</td>
                        <td>{$row['car_condition']}</td>
                        <td>{$row['car_type']}</td>
                        <td>{$row['cc']}</td>
                        <td>{$row['location_name']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "未找到結果。";
        }
        $conn->close();
        echo '<a href="management_car_add.php">新增</a> ';
        echo '<a href="management_car_update.php">修改</a> ';
        echo '<a href="management_car_delete.php">刪除</a> <br><br>';
        echo '<a href="management_main.php">回上一頁</a> <br><br>';
    ?>
</body>
</html>
