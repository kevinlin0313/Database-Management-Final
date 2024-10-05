<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" text/html; charset=utf-8">
    <title>Car Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007bff; /* 藍色 */
            height: 60px; /* 設置區域高度 */
            width: 100%;
            display: flex;
            align-items: center;
            color: white; /* 白色文字 */
            font-size: 24px; /* 字體大小 */
            position: fixed; /* 固定在頂部 */
            top: 0;
            left: 0;
            z-index: 1000; /* 確保在其他元素上方 */
            overflow: hidden; /* 確保文字不會溢出 */
        }

        .header .scrolling-text {
            white-space: nowrap;
            display: inline-block;
            animation: scroll-left 10s linear infinite;
        }

        @keyframes scroll-left {
            from {
                transform: translateX(500%);
            }
            to {
                transform: translateX(-100%);
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 120px; /* 調整這裡，讓內容不被頂部欄位遮住 */
        }

        .car {
            background-color: rgba(237, 237, 237, 1);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .car img {
            width: 200px;
            height: 130px;
            margin-bottom: 10px;
        }

        .car h2 {
            margin-top: 0;
            color: #333;
        }

        .car p {
            color: #666;
            font-weight: bold;
        }

        .car form {
            margin-top: 20px;
        }

        .car form .icons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .car form .icons img {
            width: 230px;
            height: 40px;
        }

        .car form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            height: 40px; /* Add this line to set a fixed height */
            display: inline-flex; /* Add this line to ensure consistent alignment */
            align-items: center; /* Add this line to vertically center the button content */
        }

        .car form button:hover {
            background-color: #0056b3;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        .buttons a:hover {
            text-decoration: underline;
        }
        
        .logo {
            position: absolute;
            top: 50px; /* Adjusted to be below the info bar */
            left: 0;
        }

        .logo img {
            width: 400px; /* Adjust width as needed */
            height: auto; /* Keep aspect ratio */
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

    <div class="header">
        <div class="scrolling-text">Welcome to Car Rental</div>
    </div>
    
    <div class="logo">
        <img src="logo.gif" alt="logo">
    </div>
   
    <div class="container">
        <div class="car">
            <img src="rav4.jpg" alt="rav4">
            <h2>TOYOTA</h2>
            <p>RAV4</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="TOYOTA">
                <input type="hidden" name="car_model" value="RAV4">
                <div class="icons">
                    <img src="icon4.jpg" alt="icon4">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="crv.jpg" alt="crv">
            <h2>HONDA</h2>
            <p>CR-V</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="HONDA">
                <input type="hidden" name="car_model" value="CR-V">
                <div class="icons">
                    <img src="icon4.jpg" alt="icon4">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="xtrail.jpg" alt="xtrail">
            <h2>NISSAN</h2>
            <p>X-TRAIL</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="NISSAN">
                <input type="hidden" name="car_model" value="X-TRAIL">
                <div class="icons">
                    <img src="icon3.jpg" alt="icon3">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="outlander.jpg" alt="outlander">
            <h2>MITSUBISHI</h2>
            <p>OUTLANDER</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="MITSUBISHI">
                <input type="hidden" name="car_model" value="OUTLANDER">
                <div class="icons">
                    <img src="icon2.jpg" alt="icon2">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="yaris.jpg" alt="yaris">
            <h2>TOYOTA</h2>
            <p>YARIS</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="TOYOTA">
                <input type="hidden" name="car_model" value="YARIS">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="priusc.jpg" alt="priusc">
            <h2>TOYOTA</h2>
            <p>Prius c</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="TOYOTA">
                <input type="hidden" name="car_model" value="Prius c">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="fit.jpg" alt="fit">
            <h2>HONDA</h2>
            <p>FIT</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="HONDA">
                <input type="hidden" name="car_model" value="FIT">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="altis.jpg" alt="altis">
            <h2>TOYOTA</h2>
            <p>ALTIS</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="TOYOTA">
                <input type="hidden" name="car_model" value="ALTIS">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="vios.jpg" alt="vios">
            <h2>TOYOTA</h2>
            <p>VIOS</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="TOYOTA">
                <input type="hidden" name="car_model" value="VIOS">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="sentra.jpg" alt="sentra">
            <h2>NISSAN</h2>
            <p>SENTRA</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="NISSAN">
                <input type="hidden" name="car_model" value="SENTRA">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="livina.jpg" alt="livina">
            <h2>NISSAN</h2>
            <p>LIVINA</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="NISSAN">
                <input type="hidden" name="car_model" value="LIVINA">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
        <div class="car">
            <img src="urx.jpg" alt="urx">
            <h2>LUXGEN</h2>
            <p>URX</p>
            <form action="booking.php" method="POST">
                <input type="hidden" name="car_brand" value="LUXGEN">
                <input type="hidden" name="car_model" value="URX">
                <div class="icons">
                    <img src="icon1.jpg" alt="icon1">
                </div>
                <button type="submit">Rent Now</button>
            </form>
        </div>
    </div>
    
    <div class="buttons">
        <a href="logout.php">Log out</a>
        <a href="update.php">Update</a>
    </div>
</body>
</html>