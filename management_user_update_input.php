<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>
<body> 
<?php
session_start();
if (isset($_POST['userid'])) {
    $_SESSION['userid'] = $_POST['userid'];
}
?>
    <div class="container">
        <form name="form" method="post" action="management_user_update_process.php" onsubmit="return validatePassword()">
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
            <div class="button-group form-group-full">
                <input type="submit" name="button" value="confirm" />
            </div>
        </form>
        <div class="logout-container">
            <a href="management_user_update.php"><button class="logout-button">Back</button></a>
        </div>
    </div>
</body>
</html>
