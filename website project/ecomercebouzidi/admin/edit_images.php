<?php include('header.php'); ?>
<?php
if(isset($_GET['products_id'])){
    $products_id = $_GET['products_id'];
    $products_name = $_GET['product_name'];
}else{
    header('location: products.php');
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
            <h2>Update Products Images</h2>
<div class="table-responsive">
  
    <div class="mx-auto container">
        <form action="update_images.php" enctype="multipart/form-data" id="edit-image-from" method="POST">
      <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>

           
            <input type="hidden" name="products_id" value="<?php echo $products_id; ?>">
            <input type="hidden" name="products_name" value="<?php echo $products_name; ?>">
            <div class="form-group mt-2">
                <label for="">Image1</label>
                <input type="file" class="form-control"  id="image1" name="image1" placeholder="Image 1" required>
            </div>

            <div class="form-group mt-2">
                <label for="">Image2</label>
                <input type="file" class="form-control"  id="image2" name="image2" placeholder="Image 2" required>
            </div>

            <div class="form-group mt-2">
                <label for="">Image3</label>
                <input type="file" class="form-control"  id="image3" name="image3" placeholder="Image 3" required>
            </div>

            <div class="form-group mt-2">
                <label for="">Image4</label>
                <input type="file" class="form-control"  id="image4" name="image4" placeholder="Image 4" required>
            </div>
            <div class="form-group mt-3">
                
                <input type="submit" class="btn btn-primary" name="update_images" value="Update">
            </div>
        </form>
    </div>

    </div>
</main>
</div>
</div>
