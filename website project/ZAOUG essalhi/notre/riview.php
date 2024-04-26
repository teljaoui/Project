<?php
include('server/connectiom.php');


if (isset($_POST['rating'])) {
    $properties_id = $_POST['properties_id'];
    $nom = $_POST['nom'];
    $review = $_POST['review'];
    
    $datetime = time();

    $stmt = $conn->prepare("INSERT INTO review (properties_id, review_name, review, datetime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $properties_id, $nom,  $review, $datetime);

    $stmt->execute();

    header('location: index.php');
}

?>