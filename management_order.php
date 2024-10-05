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
        input[type="text"], input[type="submit"] {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"] {
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
    <title>搜尋訂單</title>
</head>
<body>
    <h2>搜尋訂單</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="rental_id">訂單編號:</label>
            <input type="text" id="rental_id" name="rental_id">
        </div>
        <div class="form-group">
            <label for="user_id">用戶編號:</label>
            <input type="text" id="user_id" name="user_id">
        </div>
        <div class="form-group">
            <label for="username">用戶名:</label>
            <input type="text" id="username" name="username">
        </div>
        <input type="submit" value="搜尋">
    </form>
    <hr>

<?php
// 連接到資料庫
include("mysql_connect.inc.php");

// 預設查詢所有的rentals資料並連接locations表
$sql = "SELECT r.*, pl.location_name AS pick_location_name, rl.location_name AS return_location_name, u.username 
        FROM rentals r
        JOIN location pl ON r.pick_location_id = pl.location_id
        JOIN location rl ON r.return_location_id = rl.location_id
        JOIN users u ON r.user_id = u.user_id";
        
// 處理搜尋請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rental_id = $_POST['rental_id'];
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];

    // 構建查詢條件
    $conditions = [];
    if (!empty($rental_id)) {
        $conditions[] = "r.rental_id = '$rental_id'";
    }
    if (!empty($user_id)) {
        $conditions[] = "r.user_id = '$user_id'";
    }
    if (!empty($username)) {
        $conditions[] = "u.username = '$username'";
    }

    if (count($conditions) > 0) {
        // 拼接條件
        $where_clause = implode(' AND ', $conditions);
        $sql .= " WHERE $where_clause";
    }
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>訂單編號</th>
                <th>用戶編號</th>
                <th>用戶名</th>
                <th>開始時間</th>
                <th>結束時間</th>
                <th>取車地點</th>
                <th>還車地點</th>
                <th>車輛編號</th>
                <th>保險</th>
                <th>總金額</th>
                <th>支付方式</th>
                <th>時間戳記</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['rental_id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['start_time']}</td>
                <td>{$row['end_time']}</td>
                <td>{$row['pick_location_name']}</td>
                <td>{$row['return_location_name']}</td>
                <td>{$row['car_id']}</td>
                <td>{$row['insurance']}</td>
                <td>{$row['total_amount']}</td>
                <td>{$row['payment_method']}</td>
                <td>{$row['timestamp']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "未找到結果。";
}
echo '<a href="management_main.php">回上一頁</a> <br><br>';
$conn->close();
?>

</body>
</html>
