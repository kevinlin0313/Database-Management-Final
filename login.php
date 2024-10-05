<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        animation: changeBackground 60s infinite ease-in-out; 
        background-size: cover; 
        background-repeat: no-repeat; /* 防止图像重复 */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 0;
        position: relative; /* 使logo的定位相對於body */
    }

    @keyframes changeBackground {
        0% {
            background-image: url("loginbackground1.jpg"); /* 第一张背景图片 */
        }
        16.67% {
            background-image: url("loginback4.jpg"); /* 切换到第二张图片 */
        }
        33.33% {
            background-image: url("loginback4.jpg"); /* 保持显示第二张图片 */
        }
        50% {
            background-image: url("loginback5.jpg"); /* 切换到第三张图片 */
        }
        66.67% {
            background-image: url("loginback5.jpg"); /* 保持显示第三张图片  */
        }
        83.33% {
            background-image: url("loginbackground1.jpg"); /* 切换回第一张图片 */
        }
        100% {
            background-image: url("loginbackground1.jpg"); /* 保持显示第一张图片 */
        }
    }

    form {
        background-color: white; /*背景顏色*/
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /*旁邊陰影*/
        padding: 20px;
        width: 300px;
        margin-left: 1000px; /* 將整個畫面向右移動 100px */
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc; /*#ccc是輸入帳號密碼邊框的顏色*/
        border-radius: 25px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #001f3f; /*login顏色*/
        color: white; /*背景顏色*/
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #003153; /*滑鼠滑到login的地方變的顏色*/
    }

    a {
        text-decoration: none;
        color: #007bff; /*apply for an account的顏色*/
        font-size: 14px;
        margin-left: 10px;
    }

    img {
        vertical-align: middle;
    }

    .logo {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .logo img {
        width: 200px; /* 設置圖片的寬度 調整這裏可以讓logo的尺寸改變*/
        height: auto; /* 保持圖片的縱橫比 */
    }
    </style>
</head>
<body>
    <div class="logo">
        <img src="logo.gif" alt="Logo">
    </div>
    <form name="form" method="post" action="connect.php">
        <label for="name">Account:</label><br>
        <input type="text" name="name" required /><br>
        <label for="pw">Password:</label><br>
        <input type="password" name="pw" required /><br>
        <label for="captcha">Captcha:</label><br>
        <img src="captcha.php" alt="Captcha Image"><br>
        <label for="captcha-input">Enter Captcha:</label><br>
        <input type="text" name="captcha" required /><br>
        <input type="submit" name="button" value="Login" />
        <a href="register.php">Apply for an account</a>
    </form>
        
</body>
</html>
