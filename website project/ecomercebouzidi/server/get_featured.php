<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products ");


$stmt->execute();
$featured_products = $stmt->get_result();//table
	
$products_array = $featured_products->fetch_all(MYSQLI_ASSOC);
shuffle($products_array);





?>

