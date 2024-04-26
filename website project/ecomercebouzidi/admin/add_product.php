<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">
    <?php include('sidemenu.php'); ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pd-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0 ">
                    <div class="btn-group me-2"></div>
                </div>
            </div>
            <h2>Create Products</h2>
            <div class="table-responsive">

            <div class="mx-auto container">
        <form action="create_product.php"  enctype="multipart/form-data" id="create-from" method="POST">
        <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
            <div class="form-group mt-2">
            <label for="">Title</label>
                <input type="text" class="form-control" id="products-name"  name="name" placeholder="title" required>
            </div>
            <div class="form-group mt-2">
                <label for="">Description</label>
                <input type="text" class="form-control" id="products-discription" name="description" placeholder="description" required>
            </div>
            <div class="form-group mt-2">
                <label for="">Tags</label>
                <input type="text" class="form-control" id="products-tags"name="tags" placeholder="Tags" required>
            </div>
            <div class="form-group mt-2">
                <label for="">Price</label>
                <input type="text" class="form-control" id="products-price"  name="price" placeholder="price" required>
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
                <label for="">Special Offer/Sale</label>
                <input type="number" class="form-control"  id="products_offer" name="products_offer" placeholder="Sale %" required>
            </div>
            <div class="form-group mt-2">
                <label for="">Color</label>
                <input type="text" class="form-control"  id="products-color" name="color" placeholder="color" required>
            </div>
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
                
                <input type="submit" class="btn btn-primary" id="products_offer" name="create_product" value="Create">
            </div>
            
        </form>
    </div>