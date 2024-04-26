<?php include('header.php'); ?>

<?php
if(isset($_GET['properties_id'])){
$properties_id=$_GET['properties_id'];
$stmt = $conn->prepare("SELECT * FROM properties WHERE properties_id=? ");
$stmt->bind_param('i',$properties_id);
$stmt->execute();
$products = $stmt->get_result();
}else if(isset($_POST['edit_btn'])){
    

$properties_id = $_POST['properties_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price =$_POST['price'];
$products_category =$_POST['category'];








    $stmt = $conn->prepare("UPDATE properties SET properties_name=?,properties_description=?,properties_price=?,properties_category=?
     WHERE properties_id=?");
    $stmt->bind_param('ssssi',$title,$description,$price,$products_category,$properties_id);

    if($stmt->execute()){
        header('location: products.php?edit_success_message=Product has been update successfully');
    }else{
        header('location: products.php?edit_failure_message=Error occured, try again'); 
    }

}else{
    header('products.php');
    exit;
}

?>
<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">
    <?php include('sidemenu.php'); ?>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0 ">
                    <div class="btn-group me-2"></div>
                </div>
            </div>
            <h2>Products</h2>
<div class="table-responsive">
  
    <div class="mx-auto container">
        <form action="edit_product.php" id="edit-from" method="POST">
            <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
            <div class="form-group mt-2">

            <?php foreach($products as $product){ ?>
                <input type="hidden" name="properties_id" value="<?php echo $product['properties_id']; ?>">
                <label for="">Title</label>
                <input type="text" class="form-control" id="properties-name" value="<?php echo $product['properties_name']; ?>" name="title" placeholder="title">
            </div>
            <div class="form-group mt-2">
                <label for="">Description</label>
                <input type="text" class="form-control" id="properties-discription" value="<?php echo $product['properties_description']; ?>" name="description" placeholder="description">
            </div>
            <div class="form-group mt-2">
                <label for="">Price</label>
                <input type="text" class="form-control" id="properties-price" value="<?php echo $product['properties_price']; ?>" name="price" placeholder="price">
            </div>
            <div class="form-group mt-2">
            <label for="">Category</label>
            <input type="text" class="form-control" id="properties_category" value="<?php echo $product['properties_category']; ?>" name="category" placeholder="category">
            </div>
            

            
            <div class="form-group mt-3">
                
                <input type="submit" class="btn btn-primary" id="products_offer" name="edit_btn" value="Edit">
            </div>
            <?php } ?>
        </form>
    </div>