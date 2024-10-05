<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Payment Interface</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .method {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            width: 300px;
            transition: transform 0.2s ease;
        }
        .method:hover {
            transform: translateY(-5px);
        }
        .method p {
            margin: 0;
            font-size: 18px;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .method p img {
            margin-right: 10px;
            width: 24px;
            height: 24px;
        }
        .method button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s ease;
        }
        .method button:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-content img {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin: 20px 0;
        }
        .modal-content input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .modal-content button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.2s ease;
        }
        .modal-content button:hover {
            background-color: #0056b3;
        } 
        /* New CSS for commercial boxes */
        .commercial-box img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <!-- Your existing CSS stylesheets -->
  <style>
    /* Existing styles */
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

<div class="commercial-box">
    <img src="nike1.jpg" alt="Nike Shoe 1" onclick="window.open('https://www.nike.com/tw/')" style="width: 25%; height: 25%; object-fit: cover;">
    <img src="nike2.jpg" alt="Nike Shoe 2" onclick="window.open('https://www.nike.com/tw/')" style="width: 25%; height: 25%; object-fit: cover;">
    <img src="nike3.jpg" alt="Nike Shoe 3" onclick="window.open('https://www.nike.com/tw/')" style="width: 25%; height: 25%; object-fit: cover;">
    <div>
</body>
</html>

<script>
function setPaymentMethod(method) {
    document.getElementById('payment_method').value = method;
    if (method === 'Line Pay') {
        document.getElementById('linepayModal').style.display = "flex";
    } else if (method === 'Cash') {
        document.getElementById('cashModal').style.display = "flex";
    } else if (method === 'Credit Card') {
        document.getElementById('creditCardModal').style.display = "flex";
    }
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carId = isset($_POST['car_id']) ? $_POST['car_id'] : '';
    $startTime = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $endTime = isset($_POST['end_time']) ? $_POST['end_time'] : '';
    $startLocation = isset($_POST['start_location']) ? $_POST['start_location'] : '';
    $endLocation = isset($_POST['end_location']) ? $_POST['end_location'] : '';
    $insurance = isset($_POST['insurance']) ? $_POST['insurance'] : '';
    $estimatedPrice = isset($_POST['estimated_price']) ? $_POST['estimated_price'] : 100;
} else {
    echo "Invalid Request";
}
?>

<div class="method">
    <p><img src="linepay.jpg" alt="Line Pay Icon"> Line Pay</p>
    <button type="button" onclick="setPaymentMethod('Line Pay')">以此方式付款</button>
</div>
<div class="method">
    <p><img src="cash.jpg" alt="Cash Icon"> Cash</p>
    <button type="button" onclick="setPaymentMethod('Cash')">以此方式付款</button>
</div>
<div class="method">
    <p><img src="creditcard.jpg" alt="Credit Card Icon"> Credit Card</p>
    <button type="button" onclick="setPaymentMethod('Credit Card')">以此方式付款</button>
</div>

<form id="paymentForm" action="payment_finish.php" method="POST">
    <input type="hidden" name="payment_method" id="payment_method">
    <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($carId); ?>">
    <input type="hidden" name="start_time" value="<?php echo htmlspecialchars($startTime); ?>">
    <input type="hidden" name="end_time" value="<?php echo htmlspecialchars($endTime); ?>">
    <input type="hidden" name="start_location" value="<?php echo htmlspecialchars($startLocation); ?>">
    <input type="hidden" name="end_location" value="<?php echo htmlspecialchars($endLocation); ?>">
    <input type="hidden" name="insurance" value="<?php echo htmlspecialchars($insurance); ?>">
    <input type="hidden" name="estimated_price" value="<?php echo htmlspecialchars($estimatedPrice); ?>">
</form>

<div id="linepayModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('linepayModal')">&times;</span>
        <p>Line Pay QR Code</p>
        <img src="qrcode.png" alt="Line Pay QR Code"></br>
        <button type="button" onclick="document.getElementById('paymentForm').submit();">完成付款</button>
    </div>
</div>

<div id="cashModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('cashModal')">&times;</span>
        <p>Cash Barcode</p>
        <img src="code.jpg" alt="Cash Barcode"></br>
        <button type="button" onclick="document.getElementById('paymentForm').submit();">完成付款</button>
    </div>
</div>

<div id="creditCardModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('creditCardModal')">&times;</span>
        <p>Credit Card Information</p>
        <label for="cc_number">Card Number:</label>
        <input type="text" id="cc_number" name="cc_number"><br>
        <label for="cc_expiry">Expiry Date:</label>
        <input type="text" id="cc_expiry" name="cc_expiry"><br>
        <label for="cc_cvc">CVC:</label>
        <input type="text" id="cc_cvc" name="cc_cvc"><br>
        <button type="button" onclick="document.getElementById('paymentForm').submit();">完成付款</button>
    </div>
</div>

</body>
</html>
