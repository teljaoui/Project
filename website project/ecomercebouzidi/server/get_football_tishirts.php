
<?php
include('connectiom.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE products_category='football_tishirts' LIMIT 4");


$stmt->execute();
$football_tishirts = $stmt->get_result();//table

$football = $football_tishirts->fetch_all(MYSQLI_ASSOC);
shuffle($football);



?>