<?php
include('../server/connectiom.php');

if(isset($_POST['update_images'])){

    $properties_name = $_POST['properties_name'];
    $properties_id = $_POST['properties_id'];

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

    move_uploaded_file($image1, "../imag/".$image_nam1);
    move_uploaded_file($image2, "../imag/".$image_nam2);
    move_uploaded_file($image3, "../imag/".$image_nam3);
    move_uploaded_file($image4, "../imag/".$image_nam4);

    $stmt = $conn->prepare("UPDATE properties SET properties_image=?,properties_image2=?,properties_image3=?,properties_image4=? WHERE properties_id=?");
    $stmt->bind_param('ssssi',$image_name1,$image_name2,$image_name3,$image_name4,$properties_id);

    
    if($stmt->execute()){
        header('location: products.php?images_updated=Images has been update successfully');
    }else{
        header('location: products.php?images_failed=Error occured, try again'); 
    }
}


?>