<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='parfum' LIMIT 4");


$stmt->execute();
$product_parfum = $stmt->get_result();//table


$parfum = $product_parfum->fetch_all(MYSQLI_ASSOC);
shuffle($parfum);


?>