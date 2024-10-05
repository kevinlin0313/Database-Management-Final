<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//include("mysql_connect.inc.php");
$conn = mysqli_connect("localhost",  "root", "03130606", "final");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $carId = isset($_POST['car_id']) ? $_POST['car_id'] : '';
    $startTime = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $endTime = isset($_POST['end_time']) ? $_POST['end_time'] : '';
    $startLocation = isset($_POST['start_location']) ? $_POST['start_location'] : '';
    $endLocation = isset($_POST['end_location']) ? $_POST['end_location'] : '';
    $insurance = isset($_POST['insurance']) ? $_POST['insurance'] : '';
    $estimatedPrice = isset($_POST['estimated_price']) ? $_POST['estimated_price'] : 100;
	$paymentMethod = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'Cash';

    /*echo "Received data:<br>";
    echo "Car ID: " . $carId . "<br>";
    echo "Start Time: " . $startTime . "<br>";
    echo "End Time: " . $endTime . "<br>";
    echo "Start Location: " . $startLocation . "<br>";
    echo "End Location: " . $endLocation . "<br>";
    echo "Insurance: " . $insurance . "<br>";
    echo "Estimated Price: " . $estimatedPrice . "<br>";
	echo "Payment Method: " . $paymentMethod . "<br>";*/
} else {
    echo "Invalid Request";
}
session_start();
if (!isset($_SESSION['userid'])) { 
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    exit();
}

function generateRentalId($conn) {
    do {
        $letters = '';
        for ($i = 0; $i < 3; $i++) {
            $letters .= chr(rand(65, 90));  // 生成大寫字母
        }
        $numbers = '';
        for ($i = 0; $i < 7; $i++) {
            $numbers .= rand(0, 9);  // 生成數字
        }
        $rental_id = $letters . $numbers;

        // 檢查ID是否已存在
        $query = "SELECT COUNT(*) AS count FROM rentals WHERE rental_id = '$rental_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    } while ($row['count'] > 0);  // 如果存在，則繼續生成

    return $rental_id;
}


$rental_id = generateRentalId($conn);
$_SESSION['rental_id'] = $rental_id;
$_SESSION['car_id'] = $carId;

//echo $_SESSION['userid'];
$user_id=$_SESSION['userid'];
//echo $user_id;

$sql_1= "SELECT location_id FROM Location WHERE location_name='$startLocation' ";
//echo $sql_1;
$result=mysqli_query($conn,$sql_1);
$row = mysqli_fetch_assoc($result);
$start_location_id = $row['location_id'];

$sql_2= "SELECT location_id FROM Location WHERE location_name='$endLocation' ";
//echo $sql_2;
$result=mysqli_query($conn,$sql_2);
$row = mysqli_fetch_assoc($result);
$end_location_id = $row['location_id'];

//echo "Start Location: " . $start_location_id . "<br>";
//echo "End Location: " . $end_location_id . "<br>";

$sql = "INSERT INTO `rentals`(`rental_id`, `start_time`, `end_time`, `pick_location_id`, `return_location_id`, `car_id`, `user_id`, `insurance`, `total_amount`, `payment_method`, `timestamp`) VALUES ('$rental_id','$startTime','$endTime','$start_location_id','$end_location_id','$carId' ,'$user_id',$insurance,$estimatedPrice,'$paymentMethod','')";
$sql2 = "UPDATE `vehicles` SET `car_status`='0' WHERE `car_id`='$carId'";
if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2))
{	
    echo 'Finsh order successfully!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=pick_car.php>';
}
else
{
	echo 'Failed to finish order!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=rental.php>';
}

