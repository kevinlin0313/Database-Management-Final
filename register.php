<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("register4.jpg"); /*背景圖片*/
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 200vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo img {
            width: 250px; /* 設定 logo 寬度 */
            height: auto; /* 自動調整高度 */
        }

        form {
            background-color: rgba(255, 255, 255, 0.5); /*背景顏色*/
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /*旁邊陰影*/
            padding: 20px;
            width: 600px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 100px; /* 為了避免 logo 重疊表單 */
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
            background-color: #001f3f;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #003153;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            margin-left: 10px;
        }

        img {
            vertical-align: middle;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group label {
            margin-left: 5px;
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
    <div class="logo">
        <img src="logo.gif" alt="Logo">
    </div>
    <form name="form" method="post" action="register_finish.php" onsubmit="return validatePassword()">
        <div class="form-group">
            <label for="id">UserId:</label>
            <input type="text" name="id" required />
        </div>
        <div class="form-group">
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
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" required /><br>
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
        <div class="form-group-full">
            <input type="submit" name="button" value="confirm" />
        </div>
    </form>
</body>
</html>
