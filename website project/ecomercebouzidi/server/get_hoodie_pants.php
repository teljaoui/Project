<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='hoodie_pants' LIMIT 4");


$stmt->execute();
$product_hoodie_pants = $stmt->get_result();//table


$hoodie_pants = $product_hoodie_pants->fetch_all(MYSQLI_ASSOC);
shuffle($hoodie_pants);


?>