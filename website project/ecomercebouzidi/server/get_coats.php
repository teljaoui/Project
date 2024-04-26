<?php
include('connectiom.php');
$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='coats' LIMIT 4 ");

$stmt->execute();

$coats_products = $stmt->get_result();

$coats = $coats_products->fetch_all(MYSQLI_ASSOC);
shuffle($coats);


?>