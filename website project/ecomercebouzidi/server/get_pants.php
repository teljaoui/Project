<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='pants' LIMIT 4");


$stmt->execute();
$product_pants = $stmt->get_result();//table

$pants = $product_pants->fetch_all(MYSQLI_ASSOC);
shuffle($tishirt);


?>