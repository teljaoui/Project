<?php
include('../server/connectiom.php');

if(isset($_POST['update_images'])){

    $product_name = $_POST['products_name'];
    $product_id = $_POST['products_id'];

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

    $stmt = $conn->prepare("UPDATE products SET products_image=?,products_image2=?,products_image3=?,products_image4=? WHERE products_id=?");
    $stmt->bind_param('ssssi',$image_name1,$image_name2,$image_name3,$image_name4,$product_id);

    
    if($stmt->execute()){
        header('location: products.php?images_updated=Images has been update successfully');
    }else{
        header('location: products.php?images_failed=Error occured, try again'); 
    }
}


?>