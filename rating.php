<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Feedback</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap'); /* Example using Google Fonts */

        body {
            font-family: 'Roboto', sans-serif; /* Apply the new font */
            background: url('register4.jpg') no-repeat center center fixed; /* Add background image */
            background-size: cover; /* Make sure the background covers the whole page */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Add transparency to the container background */
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
        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }
        .rating input:checked ~ label,
        .rating input:not(:checked) ~ label {
            color: #ccc;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #f5b301;
        }
        .feedback {
            margin-top: 20px;
        }
        .feedback textarea,
        .feedback input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 20px; /* Rounded edges */
            resize: vertical;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 20px; /* Rounded edges */
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .question {
            text-align: left;
            margin-bottom: 10px;
        }
        .choices {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }
        .choices label {
            cursor: pointer;
            margin-left: 10px;
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
        <h2>Feedback</h2>
        <form name="form" method="post" action="order_finish.php">
            <div class="question">
                <label>How would you rate our service?</label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" required/>
                    <label for="star5" title="5 stars">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="4 stars">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="3 stars">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="2 stars">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="1 star">&#9733;</label>
                </div>
            </div>
            <div class="question">
                <label>Did our product or service meet your expectations?</label>
                <div class="choices">
                    <input type="radio" id="expectationsYes" name="expectations" value="Yes" required/>
                    <label for="expectationsYes">Yes</label>
                    <input type="radio" id="expectationsNo" name="expectations" value="No" />
                    <label for="expectationsNo">No</label>
                </div>
            </div>
            <div class="question">
                <label>Would you recommend our product/service to others?</label>
                <div class="choices">
                    <input type="radio" id="recommendYes" name="recommend" value="Yes" required/>
                    <label for="recommendYes">Yes</label>
                    <input type="radio" id="recommendNo" name="recommend" value="No" />
                    <label for="recommendNo">No</label>
                </div>
            </div>
            <div class="question">
                <label for="dissatisfied">What aspect of the product or service were you most satisfied/dissatisfied by?</label>
                <div class="feedback">
                    <input type="text" id="dissatisfied" name="dissatisfied" placeholder="Please specify">
                </div>
            </div>
            <div class="feedback">
                <label for="explain">Any other recommendation?</label>
                <textarea id="explain" name="explain" placeholder="Write your feedback here..."></textarea>
            </div>
            <input type="submit" name="button" value="Submit">
        </form>
    </div>
</body>
</html>
