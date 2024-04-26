<?php
include('../server/connectiom.php');

if(isset($_POST['create_product'])){
    $properties_name = $_POST['name'];
    $properties_description = $_POST['description'];
    $properties_price = $_POST['price'];
    $properties_category = $_POST['category'];
    

    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];
    $file_name = $_FILES['image1']['name'];

    $image_nam1 = $properties_name."1.png";
    $image_nam2 = $properties_name."2.png";
    $image_nam3 = $properties_name."3.png";
    $image_nam4 = $properties_name."4.png";


    $image_name1 = "img/".$properties_name."1.png";
    $image_name2 = "img/".$properties_name."2.png";
    $image_name3 = "img/".$properties_name."3.png";
    $image_name4 = "img/".$properties_name."4.png";

    move_uploaded_file($image1, "../img/".$image_nam1);
    move_uploaded_file($image2, "../img/".$image_nam2);
    move_uploaded_file($image3, "../img/".$image_nam3);
    move_uploaded_file($image4, "../img/".$image_nam4);

    $stmt = $conn->prepare("INSERT INTO properties (properties_name, properties_category, properties_description, properties_image, properties_image2, properties_image3, properties_image4, properties_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('ssssssss', $properties_name, $properties_category, $properties_description, $image_name1, $image_name2, $image_name3, $image_name4, $properties_price);

    if($stmt->execute()){
        header('Location: products.php?product_created=Product has been created successfully');
        exit();
    }else{
        header('Location: products.php?product_failed=Error occurred, try again'); 
        exit();
    }
}
?>
