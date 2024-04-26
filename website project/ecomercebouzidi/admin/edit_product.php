<?php include('header.php'); ?>

<?php
if(isset($_GET['products_id'])){
$product_id=$_GET['products_id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE products_id=? ");
$stmt->bind_param('i',$product_id);
$stmt->execute();
$products = $stmt->get_result();
}else if(isset($_POST['edit_btn'])){
    

$product_id = $_POST['products_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price =$_POST['price'];
$color =$_POST['color'];
$products_offer =$_POST['products_offer'];
$products_category =$_POST['category'];
$tags = $_POST['tags'];








    $stmt = $conn->prepare("UPDATE products SET products_name=?,products_description=?,products_price=?,products_color=?,products_special_offer=?,products_category=?,products_tags=?
     WHERE products_id=?");
    $stmt->bind_param('sssssssi',$title,$description,$price,$color,$products_offer,$products_category,$tags,$product_id);

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
                <input type="hidden" name="products_id" value="<?php echo $product['products_id']; ?>">
                <label for="">Title</label>
                <input type="text" class="form-control" id="products-name" value="<?php echo $product['products_name']; ?>" name="title" placeholder="title">
            </div>
            <div class="form-group mt-2">
                <label for="">Description</label>
                <input type="text" class="form-control" id="products-discription" value="<?php echo $product['products_description']; ?>" name="description" placeholder="description">
            </div>
            <div class="form-group mt-2">
                <label for="">Tags</label>
                <input type="text" class="form-control" id="products-tags" value="<?php echo $product['products_tags']; ?>" name="tags" placeholder="Tags ">
            </div>
            <div class="form-group mt-2">
                <label for="">Price</label>
                <input type="text" class="form-control" id="products-price" value="<?php echo $product['products_price']; ?>" name="price" placeholder="price">
            </div>
            <div class="form-group mt-2">
            <label for="">Category</label>
                <select name="category" class="form-select" required id="">
                <option value="tishirt">Tishirt</option>
                <option value="hoodie_pants">Hoodie and Pants</option>
                <option value="hoodie">Hoodie</option>
                <option value="pants">Pants</option>
                <option value="shoes">Shoes</option>
                <option value="parfum">Parfum</option>
                <option value="watches">Watches</option>
                <option value="hoodie">Hoodie</option>
                <option value="cosplay">Cosplay</option>
                <option value="football_tishirts">Football Tishirts</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="">Color</label>
                <input type="text" class="form-control" value="<?php echo $product['products_color']; ?>" id="products-color" name="color" placeholder="color">
            </div>
            <div class="form-group mt-2">
                <label for="">Special Offer/Sale</label>
                <input type="number" class="form-control" value="<?php echo $product['products_special_offer']; ?>" id="products_offer" name="products_offer" placeholder="Sale %">
            </div>

            
            <div class="form-group mt-3">
                
                <input type="submit" class="btn btn-primary" id="products_offer" name="edit_btn" value="Edit">
            </div>
            <?php } ?>
        </form>
    </div>