<?php 
session_start();
 include('../server/connectiom.php'); 
?>

<?php
if(isset($_GET['products_id'])){
     $products_id = $_GET['products_id'];
    $stmt= $conn->prepare("DELETE FROM products WHERE products_id=? ");
    $stmt->bind_param('i',$products_id);
    if($stmt->execute()){
        header('location: products.php?deleted_successfully=Products has been deleted successfully');

    }else{
        header('location: products.php?deleted_failure=Could not delete products');
    }

   
}
?>