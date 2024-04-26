<?php
include('connectiom.php');
$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='tishirt' LIMIT 4 ");

$stmt->execute();

$tishirt_products = $stmt->get_result();
$tishirt = $tishirt_products->fetch_all(MYSQLI_ASSOC);
shuffle($tishirt);

?>