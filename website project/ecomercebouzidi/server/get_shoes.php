<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='shoes' LIMIT 4");


$stmt->execute();
$product_shoes = $stmt->get_result();//table

$shoes = $product_shoes->fetch_all(MYSQLI_ASSOC);
shuffle($shoes);




?>

