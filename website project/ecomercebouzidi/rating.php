<?php
include('server/connectiom.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
}

if (isset($_POST['rating'])) {
    $product_id = $_POST['products_id'];
    $nom = $_POST['nom'];
    $review = $_POST['review'];
    $rating = $_POST['product_rating'];
    $datetime = time();

    $stmt = $conn->prepare("INSERT INTO review_table (product_id, user_name, user_rating, user_review, datetime) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('issss', $product_id, $nom, $rating, $review, $datetime);

    if($stmt->execute()){
        header('Location: single_product.php?review_message=Review has been successfully');
        exit();
    }else{
        header('Location: single_product.php?review_failed=Error occurred, try again'); 
        exit();
    }

}


?>
