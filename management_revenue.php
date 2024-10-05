<!DOCTYPE html>
<html lang="en">
<head>
    <title>年度收入查詢</title>
    <meta charset="UTF-8">
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
    <title>Search Vehicles</title>
</head>
<body>
    <h1>Yearly Revenue</h1>
    
    <!-- 年分選擇表單 -->
    <form method="POST" action="">
        <label for="year">Year：</label>
        <select id="year" name="year">
        <option value="">Select a year</option>
                <?php
                // 連接到資料庫
                include("mysql_connect.inc.php");

                // 獲取所有年分
                $year_sql = "SELECT DISTINCT YEAR(end_time) AS year 
                             FROM rentals ORDER BY year DESC";
                $year_result = $conn->query($year_sql);

                if ($year_result->num_rows > 0) {
                    while ($year_row = $year_result->fetch_assoc()) {
                        echo "<option>{$year_row['year']}</option>";
                    }
                }

                ?>
        </select>
        <button type="submit">search</button>
    </form>

<?php 

$sql = "SELECT v.model, v.brand, SUM(r.total_amount) AS revenue, YEAR(r.end_time) AS year
        FROM rentals r
        JOIN vehicles v 
        ON r.car_id = v.car_id
        GROUP BY v.model";

$searchConditions = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];

    // 構建查詢條件
    $conditions = [];
    if (!empty($year)) {
        $conditions[] = "year = '$year'";
    }

    if (count($conditions) > 0) {
        $having_clause = implode(' OR ', $conditions);
        $sql .= " HAVING $having_clause ";
    }
}

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Revenue</th>
                <th>Year</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['brand']}</td>
                <td>{$row['model']}</td>
                <td>{$row['revenue']}</td>
                <td>{$row['year']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}



$conn->close();
?>


</body>
</html>
