<?php
session_start();
?>
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

$result_users = mysqli_query($conn, $sql_users);

echo "<h2>刪除顧客資訊</h2>";

echo "<table border='1'>
        <tr>
            <th>Select</th>
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
            <td><a href='management_user_delete_process.php?userid={$row_users['user_id']}'>Select</a></td>
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
?>
