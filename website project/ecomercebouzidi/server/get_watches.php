<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='watches' LIMIT 4");


$stmt->execute();
$product_watches = $stmt->get_result();//table

$watches = $product_watches->fetch_all(MYSQLI_ASSOC);
shuffle($watches);



?>


