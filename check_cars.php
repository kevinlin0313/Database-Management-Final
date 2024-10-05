<?php
//include("mysql_connect.inc.php");
$conn = mysqli_connect("localhost",  "root", "03130606", "final");

//$start_time = $_POST['start_time'];
$car_brand=$_POST['car_brand'];
$car_model=$_POST['car_model'];
$start_location=$_POST['start_location'];

$sql_1= "SELECT location_id FROM Location WHERE location_name='$start_location' ";
//echo $sql_1;
$result=mysqli_query($conn,$sql_1);
$row = mysqli_fetch_assoc($result);
$location_id = $row['location_id'];


$sql_2 = "SELECT * FROM vehicles WHERE car_status=1 AND location_id='$location_id' AND brand='$car_brand' AND model='$car_model'";
//echo $sql_2;
$result_2=mysqli_query($conn,$sql_2);
$response = mysqli_fetch_assoc($result_2);
if($response!=NULL)
    $response['available'] = true;
else
    $response['available'] = false;
header('Content-Type: application/json');
echo json_encode($response);

?>
