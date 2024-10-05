<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("register7.jpg"); /* 背景圖片 */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200vh;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.5); /* 背景顏色 */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            width: 100%;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            width: calc(50% - 10px); /* 使兩個並排顯示 */
        }
        .form-group-full {
            width: 100%;
        }
        .form-group-triple {
            width: calc(33.33% - 13.33px); /* 使三個並排顯示 */
        }
        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff; /* 確定框框的顏色 */
            color: white; /* confirm字的顏色 */
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* 滑鼠滑到confirm變的顏色 */
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            margin-left: 10px;
        }
        .logout-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .logout-button {
            background-color: #dc3545; /* logout框框的顏色 */
            color: white; /* log out 字的顏色 */
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .logout-button:hover {
            background-color: #c82333; /* 滑鼠滑到logout變的顏色 */
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .checkbox-group label {
            margin-left: 5px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            width: 100%;
        }
        .logout-container {
            width: 100%;
            display: flex;
            justify-content: flex-end; /* 將按鈕置於左側 */
            margin-top: 10px;
        }

    </style>
    <script type="text/javascript">
        function validatePassword() {
            var pw1 = document.forms["form"]["pw"].value;
            var pw2 = document.forms["form"]["pw2"].value;
            if (pw1 != pw2) {
                alert("兩次輸入的密碼不相同！");
                return false; 
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['userid'])) { 
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
        exit();
    }
    ?>
    <div class="container">
        <form name="form" method="post" action="update_finish.php" onsubmit="return validatePassword()">
            <div class="form-group-full">
                <label for="name">Account Name:</label>
                <input type="text" name="name" required />
            </div>
            <div class="form-group">
                <label for="pw">Password:</label>
                <input type="password" name="pw" required />
            </div>
            <div class="form-group">
                <label for="pw2">Enter password again:</label>
                <input type="password" name="pw2" required />
            </div>
            <div class="form-group-full">
                <label for="email">Email:</label>
                <input type="text" name="email" required />
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" required />
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value="Gentleman">Gentleman</option>
                    <option value="Lady">Lady</option>
                </select>
            </div>
            <div class="form-group-full">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" required />
            </div>
            <div class="form-group">
                <label for="address(city)">Address(city):</label>
                <input type="text" name="address(city)" required />
            </div>
            <div class="form-group">
                <label for="address(district)">Address(district):</label>
                <input type="text" name="address(district)" required />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" required />
            </div>
            <div class="form-group">
                <label for="postal_code">Postal code:</label>
                <input type="text" name="postal_code" required />
            </div>
            <div class="form-group">
                <label for="invoice_address(city)">Invoice Address(city):</label>
                <input type="text" name="invoice_address(city)" required />
            </div>
            <div class="form-group">
                <label for="invoice_address(district)">Invoice Address(district):</label>
                <input type="text" name="invoice_address(district)" required />
            </div>
            <div class="form-group">
                <label for="invoice_address">Invoice Address:</label>
                <input type="text" name="invoice_address" required />
            </div>
            <div class="form-group">
                <label for="invoice_postal_code">Invoice postal code:</label>
                <input type="text" name="invoice_postal_code" required />
            </div>
            <div class="form-group-triple">
                <label for="emergency_person">Emergency person:</label>
                <input type="text" name="emergency_person" required />
            </div>
            <div class="form-group-triple">
                <label for="relation">Relation:</label>
                <input type="text" name="relation" required />
            </div>
            <div class="form-group-triple">
                <label for="emergency_phone">Emergency phone:</label>
                <input type="text" name="emergency_phone" required />
            </div>
            <div class="form-group-full checkbox-group">
                <input type="checkbox" name="ad" checked/>
                <label for="ad">Allow AD</label>
            </div>
            <div class="form-group-full checkbox-group">
                <input type="checkbox" name="message" checked/>
                <label for="message">Allow Message</label>
            </div>
            <div class="form-group-full checkbox-group">
                <input type="checkbox" name="membership" required/>
                <label for="membership">Agree Membership Terms</label>
            </div>
            <div class="button-group form-group-full">
                <input type="submit" name="button" value="confirm" />
            </div>
        </form>
        <div class="logout-container">
            <a href="logout.php"><button class="logout-button">Log out</button></a>
        </div>
    </div>
</body>
</html>
