<?php
include('../server/connectiom.php');

if(isset($_POST['create_product'])){
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['products_offer'];
    $product_category = $_POST['category'];
    $product_tags = $_POST['tags'];
    $product_color = $_POST['color'];

    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];
    $file_name = $_FILES['image1']['name'];

    $image_nam1 = $product_name."1.png";
    $image_nam2 = $product_name."2.png";
    $image_nam3 = $product_name."3.png";
    $image_nam4 = $product_name."4.png";


    $image_name1 = "imag/".$product_name."1.png";
    $image_name2 = "imag/".$product_name."2.png";
    $image_name3 = "imag/".$product_name."3.png";
    $image_name4 = "imag/".$product_name."4.png";

    move_uploaded_file($image1, "../imag/".$image_nam1);
    move_uploaded_file($image2, "../imag/".$image_nam2);
    move_uploaded_file($image3, "../imag/".$image_nam3);
    move_uploaded_file($image4, "../imag/".$image_nam4);

    $stmt = $conn->prepare("INSERT INTO products (products_name, products_category, products_description, products_image, products_image2, products_image3, products_image4, products_price, products_special_offer, products_color) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('ssssssssss', $product_name, $product_category, $product_description, $image_name1, $image_name2, $image_name3, $image_name4, $product_price, $product_special_offer, $product_color);

    if($stmt->execute()){
        header('Location: products.php?product_created=Product has been created successfully');
        exit();
    }else{
        header('Location: products.php?product_failed=Error occurred, try again'); 
        exit();
    }
}
?>
