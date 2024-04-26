<?php 
session_start();
 include('../server/connectiom.php'); 
?>

<?php
if(isset($_GET['order_id'])){
     $order_id = $_GET['order_id'];
    $stmt= $conn->prepare("DELETE FROM orders WHERE order_id=? ");
    $stmt->bind_param('i',$order_id);
    if($stmt->execute()){
        header('location: index.php?deleted_successfully=Products has been deleted successfully');

    }else{
        header('location: index.php?deleted_failure=Could not delete products');
    }

   
}
?>