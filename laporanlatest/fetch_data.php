<?php
// db_connection.php should contain the code to connect to the database
require_once 'db_connection.php';

$location = $_GET['location'];
$area = $_GET['area'];
$zone = $_Get['zone'];
$DUN = $_Get['DUN'];
$Parlimen = $_Get['Parlimen'];

$sql = "SELECT location, area, zone, DUN, Parlimen FROM DatabaseReport WHERE location = ? AND area = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss,", $location, $area,$zone,$DUN,$Parlimen);
$stmt->execute();
$result = $stmt->get_result();


$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);