<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM properties ");


$stmt->execute();
$featured_properties = $stmt->get_result();//table
	
$properties_array = $featured_properties->fetch_all(MYSQLI_ASSOC);
shuffle($properties_array);





?>

