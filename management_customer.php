<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        white-space: nowrap; /* Prevent text from wrapping */
    }
</style>
    <title>Customer</title>
</head>
<body>
<h2>搜尋顧客資訊</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="id">User ID:</label>
            <input type="text" name="id">
        </div>
        <div class="form-group">
            <label for="name">User name:</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="phone">User Phone:</label>
            <input type="text" name="phone">
        </div>
        <input type="submit" value="搜尋">
    </form>
    <hr>
<?php
    include("mysql_connect.inc.php");

    $sql_users = "
        SELECT 
            u.user_id, u.username, u.birthday, u.gender, u.email, u.phone, u.message, u.ad,
            c.city AS com_city, c.district AS com_district, c.postal_code AS com_postal_code, c.address AS com_address,
            i.city AS inv_city, i.district AS inv_district, i.postal_code AS inv_postal_code, i.address AS inv_address,
            e.emergency_person, e.relation, e.emergency_phone
        FROM 
            users u
        LEFT JOIN 
            com_address c ON u.user_id = c.user_id
        LEFT JOIN 
            invoice_address i ON u.user_id = i.user_id
        LEFT JOIN 
            emergency e ON u.user_id = e.user_id";

    $searchConditions = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userid = $_POST['id'];
            $username = $_POST['name'];
            $userphone = $_POST['phone'];
            $conditions = [];
            if (!empty($userid)) {
                $conditions[] = "u.user_id = '$userid'";
                $searchConditions[] = "User ID: $userid";
            }
            if (!empty($model)) {
                $conditions[] = "u.username = '$username'";
                $searchConditions[] = "User Name: $username";
            }
            if (!empty($location_id)) {
                $conditions[] = "u.phone = '$userphone'";
                $searchConditions[] = "User Phone: $userphone";
            }
            if (count($conditions) > 0) {
                $where_clause = implode(' AND ', $conditions);
                $sql_users .= " WHERE $where_clause";
            }
        }

$result_users = mysqli_query($conn, $sql_users);
if (count($searchConditions) > 0) {
    echo "<h3>搜尋條件：</h3>";
    echo "<p>" . implode(', ', $searchConditions) . "</p>";
}
echo "<table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Ad</th>
            <th>Company City</th>
            <th>Company District</th>
            <th>Company Postal Code</th>
            <th>Company Address</th>
            <th>Invoice City</th>
            <th>Invoice District</th>
            <th>Invoice Postal Code</th>
            <th>Invoice Address</th>
            <th>Emergency Person</th>
            <th>Relation</th>
            <th>Emergency Phone</th>
        </tr>";

while ($row_users = mysqli_fetch_assoc($result_users)) {
    echo "<tr>
            <td>{$row_users['user_id']}</td>
            <td>{$row_users['username']}</td>
            <td>{$row_users['birthday']}</td>
            <td>{$row_users['gender']}</td>
            <td>{$row_users['email']}</td>
            <td>{$row_users['phone']}</td>
            <td>" . ($row_users['message'] ? 'Yes' : 'No') . "</td>
            <td>" . ($row_users['ad'] ? 'Yes' : 'No') . "</td>
            <td>{$row_users['com_city']}</td>
            <td>{$row_users['com_district']}</td>
            <td>{$row_users['com_postal_code']}</td>
            <td>{$row_users['com_address']}</td>
            <td>{$row_users['inv_city']}</td>
            <td>{$row_users['inv_district']}</td>
            <td>{$row_users['inv_postal_code']}</td>
            <td>{$row_users['inv_address']}</td>
            <td>{$row_users['emergency_person']}</td>
            <td>{$row_users['relation']}</td>
            <td>{$row_users['emergency_phone']}</td>
          </tr>";
}
echo "</table>";
echo '<a href="management_user_add.php">新增</a> ';
echo '<a href="management_user_update.php">修改</a> ';
echo '<a href="management_user_delete.php">刪除</a> <br><br>';
echo '<a href="management_main.php">回上一頁</a> <br><br>';
?>
</body>
</html>