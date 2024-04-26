<?php 
session_start();
 include('../server/connectiom.php'); 
?>

<?php
if(isset($_GET['properties_id'])){
     $properties_id = $_GET['properties_id'];
    $stmt= $conn->prepare("DELETE FROM properties WHERE properties_id=? ");
    $stmt->bind_param('i',$properties_id);
    if($stmt->execute()){
        header('location: products.php?deleted_successfully=Products has been deleted successfully');

    }else{
        header('location: products.php?deleted_failure=Could not delete products');
    }

   
}
?>