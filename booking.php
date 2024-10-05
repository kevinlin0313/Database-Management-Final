<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- 使用 Font Awesome 來增加圖示 -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- 使用 Google 字體 -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333333;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: 500;
            color: #555555;
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }

        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .link {
            margin-top: 20px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .link a:hover {
            text-decoration: underline;
        }

        /* 彈出視窗樣式 */
        #modal {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* 半透明背景 */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        #modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            position: relative;
            text-align: left;
        }

        #modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            color: #888;
        }

        #modal-close:hover {
            color: red;
        }

        #modal h3 {
            margin-top: 0;
            color: #333333;
        }

        #modal p {
            color: #555555;
            margin: 10px 0;
        }

        #modal button {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto 0;
        }

        #modal button:hover {
            background-color: #218838;
        }

    </style>
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
        <h2>Confirm Booking</h2>
        <form name="booking" method="post" onsubmit="return check()">
            <?php
                echo "<p id='car_brand'>Car Brand: " . htmlspecialchars($_POST['car_brand']) . "</p>";
                echo "<p id='car_model'>Car Model: " . htmlspecialchars($_POST['car_model']) . "</p>";
            ?>
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" required>
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" required>
            <label for="start_location">Start Location:</label>
            <select id="start_location">
                <option value="Taipei">Taipei</option>
                <option value="Taichung">Taichung</option>
                <option value="Tainan">Tainan</option>
                <option value="Kaohsiung">Kaohsiung</option>
                <option value="Yilan">Yilan</option>
                <option value="Hualien">Hualien</option>
            </select>
            <label for="end_location">End Location:</label>
            <select id="end_location">
            <option value="Taipei">Taipei</option>
                <option value="Taichung">Taichung</option>
                <option value="Tainan">Tainan</option>
                <option value="Kaohsiung">Kaohsiung</option>
                <option value="Yilan">Yilan</option>
                <option value="Hualien">Hualien</option>
            </select>
            <div class="checkbox-container">
                <input type="checkbox" id="insurance" checked>
                <label for="insurance">Insurance</label>
            </div>
            
            <input type="submit" name="button" value="Confirm Booking">
        </form>
        <div class="link">
            <a href="rental.php"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <!-- 彈出視窗 -->
    <div id="modal" style="display:none;">
        <div id="modal-content">
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function check() {
            var startTime = document.getElementById('start_time').value;
            var endTime = document.getElementById('end_time').value;
            var startLocation = document.getElementById('start_location').value;
            var endLocation = document.getElementById('end_location').value;
            var checkbox = document.getElementById('insurance');
            var insurance = checkbox.checked;
            
            var carBrand = document.getElementById('car_brand').textContent;
            var carModel = document.getElementById('car_model').textContent;
            //console.log('Original Car Model:', carModel);
            var car_Brand = carBrand.split(': ')[1];
            var car_Model = carModel.split(': ')[1];
            //console.log(car_Model);

            if (new Date(startTime) >= new Date(endTime)) {
                alert('End time must be after start time. Please select again.');
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'check_cars.php',
                data: {start_location: startLocation, car_brand:car_Brand, car_model:car_Model},
                dataType: 'json',
                success: function(response) {    
                    var modal = document.getElementById('modal');
                    var container = document.getElementById('modal-content');

                    if (response.available) {
                        container.innerHTML = `
                        <form id="myForm" action="payment.php" method="post">
                            <span id="modal-close" onclick="closeModal()">&times;</span>
                            <h3>Order Details</h3>
                            <p><strong>Car Type:</strong> ${response.car_type}</p>
                            <p><strong>Car Brand:</strong> ${response.brand}</p>
                            <p><strong>Car Model:</strong> ${response.model}</p>
                            <p><strong>License Plate:</strong> ${response.license_plate}</p>
                            <p><strong>Car Condition:</strong> ${response.car_condition}</p>
                            <p><strong>Start Time:</strong> ${startTime}</p>
                            <p><strong>End Time:</strong> ${endTime}</p>
                            <p><strong>Start Location:</strong> ${startLocation}</p>
                            <p><strong>End Location:</strong> ${endLocation}</p>
                            <p><strong>Estimated Price:</strong>100</p>

                            <input type="hidden" name="car_id" value="${response.car_id}">
                            <input type="hidden" name="start_time" value="${startTime}">
                            <input type="hidden" name="end_time" value="${endTime}">
                            <input type="hidden" name="start_location" value="${startLocation}">
                            <input type="hidden" name="end_location" value="${endLocation}">
                            <input type="hidden" name="insurance" value="${insurance}">
                            <input type="hidden" name="estimated_price" value="100">
                            
                            <button type="submit">Submit Order</button>
                        </form>
                        `;
                        modal.style.display = 'flex'; // Show the modal
                    } else {
                        container.innerHTML = `
                            <span id="modal-close" onclick="closeModal()">&times;</span>
                            <h3>No cars available for the selected time and locations. Please try again.</h3>
                        `;
                        modal.style.display = 'flex'; // Show the modal
                    }
                },
                error: function() {
                    alert("Server error, please try again later.");
                }
            });
            return false;
        }
    </script>
</body>
</html>
