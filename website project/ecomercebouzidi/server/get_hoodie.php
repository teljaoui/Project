<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='hoodie' LIMIT 4");


$stmt->execute();
$product_hoodie = $stmt->get_result();//table

$hoodie = $product_hoodie->fetch_all(MYSQLI_ASSOC);
shuffle($hoodie);


?>