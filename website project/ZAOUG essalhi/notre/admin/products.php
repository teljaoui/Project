<?php include('header.php'); ?>


<?php 


if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
}else{
    $page_no = 1;
}

$stmt1= $conn->prepare("SELECT COUNT(*) As total_records FROM properties ");

$stmt1->execute();

$stmt1->bind_result($total_records);

$stmt1->store_result();

$stmt1->fetch();

$total_records_per_page = 5;
$offset = ($page_no-1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";

$total_no_of_pages = ceil($total_records/$total_records_per_page);

$stmt2 = $conn->prepare("SELECT * FROM properties LIMIT $offset,$total_records_per_page");
$stmt2->execute();
$produts = $stmt2->get_result();

 

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
<?php if(isset($_GET['edit_success_message'])){ ?>
    <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['edit_failure_message'])){ ?>
    <p class="text-center" style="color: red;"><?php echo $_GET['edit_failure_message']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['deleted_successfully'])){ ?>
    <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['deleted_failure'])){ ?>
    <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['product_created'])){ ?>
    <p class="text-center" style="color: green;"><?php echo $_GET['product_created']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['product_failed'])){ ?>
    <p class="text-center" style="color: red;"><?php echo $_GET['product_failed']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['images_updated'])){ ?>
    <p class="text-center" style="color: green;"><?php echo $_GET['images_updated']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['images_failed'])){ ?>
    <p class="text-center" style="color: red;"><?php echo $_GET['images_failed']; ?></p>
    <?php } ?>

    

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Offer</th>
                <th scope="col">Product Category</th>
                <th scope="col">Product Tags</th>
                <th scope="col">Product color</th>
                <th scope="col">Edit Images</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produts as $product){ ?>
            <tr>
                <td><?php echo $product['properties_id'] ?></td>
                <td><img src="../img/<?php echo $product['properties_image'] ?>" style="width: 70px;height: 70px;" alt=""></td>
                <td><?php echo $product['properties_name'] ?></td>
                <td><?php echo "$".$product['properties_price'] ?></td>
                <td><?php echo $product['properties_category'] ?></td>
                <td><a class="btn btn-warning" href="<?php echo "edit_images.php?properties_id=".$product['properties_id']."&properties_name=".$product['properties_name']; ?>">Edit Images</a></td>
                <td><a class="btn btn-primary" href="edit_product.php?properties_id=<?php echo $product['properties_id']; ?>">Edit</a></td>
                <td><a href="delete_product.php?properties_id=<?php echo $product['properties_id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>



    <nav aria-label="Page navigation example">
        <ul class="pagination mt-5">
            
            <li class="page-item <?php if($page_no<=1){echo "disabled";} ?>">
            <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a></li>


            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
            <?php if($page_no>=3){ ?>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>

            <?php } ?>

            
            <li class="page-item <?php if($page_no>= $total_no_of_pages){echo "disabled";} ?>">
            <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);} ?>">Next</a></li>

        </ul>
    </nav>





</div>
</main>
    </div>
</div>



