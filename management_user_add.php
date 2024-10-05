<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h2>新增顧客</h2>
<form action="management_user_add_process.php" method="post">
    User ID: <input type="text" name="userid"><br>
    Name: <input type="text" name="username"><br>
    Birthday: <input type="date" name="birthday"><br>
    Gender: <select name="gender">
        <option value="Gentleman">Gentleman</option>
        <option value="Lady">Lady</option>
    </select><br>
    Password: <input type="password" name="password"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    Message: <input type="checkbox" name="message"><br>
    Ad: <input type="checkbox" name="ad"><br>
    Company city: <input type="text" name="address(city)"><br>
    Company district: <input type="text" name="address(district)"><br>
    Company postal code: <input type="text" name="postal_code"><br>
    Company address: <input type="text" name="address"><br>
    Invoice city: <input type="text" name="invoice_address(city)"><br>
    Invoice district: <input type="text" name="invoice_address(district)"><br>
    Invoice postal code: <input type="text" name="invoice_postal_code"><br>
    Invoice address: <input type="text" name="invoice_addres"><br>
    Emergency person: <input type="text" name="emergency_person"><br>
    Relation: <input type="text" name="relation"><br>
    Emergency phone: <input type="text" name="emergency_phone"><br>
    <input type="submit" value="新增">
</form>


