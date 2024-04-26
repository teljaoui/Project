
<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='cosplay' LIMIT 4");


$stmt->execute();
$product_cosplay = $stmt->get_result();//table


$cosplay = $product_cosplay->fetch_all(MYSQLI_ASSOC);
shuffle($cosplay);


?>