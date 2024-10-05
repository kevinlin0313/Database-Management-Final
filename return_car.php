<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Return Car Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            color: #333333;
            margin-bottom: 20px;
        }

        .upload input[type="file"] {
            margin: 10px 0;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 5px;
            width: calc(100% - 24px); /* full width minus padding and border */
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
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
        <h2>Upload Picture</h2>
        <form action="payment_update.php" method="POST" enctype="multipart/form-data">
            <div class="upload">
                <input type="file" name="car_picture" accept="image/*" required>
            </div>
            <button type="submit">按此還車</button>
        </form>
    </div>
</body>
</html>
