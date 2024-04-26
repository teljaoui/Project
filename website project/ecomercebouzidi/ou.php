<?php include('layouts/header.php');?>
<?php include('server/get_featured.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="owl-car/css/owl.carousel.min.css">
    <link rel="stylesheet" href="owl-car/css/owl.theme.default.min.css">
    <title>Document</title>
</head>
<body>

<style>
 
:root {
    --background-color: #ffffff; /* لون الخلفية في الوضع العادي */
    --text-color: #000000; /* لون النص في الوضع العادي */
  }
  
  /* الوضع العادي */
  body {
    background-color: var(--background-color);
    color: var(--text-color);
  }
  #header{
    background-color: var(--background-color);
    color: var(--text-color);
  }
  #navbar li a{
    color: var(--text-color);
}
#navbar{
    background-color: var(--background-color);
}

  /* وضع الظلام */
  body.dark-mode {
    --background-color: #181818; /* لون الخلفية في وضع الظلام */
    --text-color: #ffffff; /* لون النص في وضع الظلام */
  }

  #header.dark-mode {
    --background-color: #181818; /* لون الخلفية في وضع الظلام */
    --text-color: #ffffff; /* لون النص في وضع الظلام */
  }
  #navbar.dark-mode {
    --background-color: #181818; 
}
  
  #navbar li a .dark-mode{
    --text-color: #ffffff;
}
</style>
   

      <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span>Best Prices This Season</h1>
            <p>Eshop offers the best products for most affordable prices</p>
            <button>Shop Now</button>
        </div>
      </section>


      <section id="brand" class="container">
        <div class="row">
            <img src="image/nike.png" class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="">
            <img src="image/10994276-adidas-logo-symbole-vetements-design-icone-abstrait-football-illustrationle-gratuit-vectoriel.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="">
            <img src="image/gucci_logo.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="">
            <img src="image/PUMA-clothes-shoes-accessories-for-women-men-kids.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="">
        </div>
      </section>

      <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- 11 -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="image/black_033d68f0-989e-46d1-b194-73a7f16b9861_1800x1800.webp" alt="">
                <div class="details">
                    <h2>Estreamely Awesome Shose</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!-- 2 -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="image/naruto1.png" alt="">
                <div class="details">
                    <h2>Awesome Jacket</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!-- 3 -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="image/199764.png" alt="">
                <div class="details">
                    <h2>50% OFF Watches</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
        </div>
      </section>

      
    <section id="top-sale">
        <div class="container text-center">
            <h3>Our featured</h3>
            <hr>
            <p></p>
        </div>
        
        
        <div class="container py-5">
            <div class="owl-carousel owl-theme">
                
            <?php foreach ($products_array as $row) { ?>
                        <div class="item cart">
                            <div class="pra product text-center ">
                        <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                        <div class="star">
                           <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                        </div>
                        <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                        <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                        
                        <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
                    </div>
                </div>
                <?php } ?>
            </div>

            </div>
      
    </section>

   
            <!-- Banner -->
            <section id="banner" class="my-5 py-5">
                <div class="container">
                    <h4>MID SEASON'S SALE</h4>
                    <h1>Autumn Collection <br> UP to 30% OFF</h1>
                    <button class="text-uppercase">shop now <i class="fal fa-shopping-cart cart"></i></button>
                </div>
              </section>

      <!-- Clothes -->

      <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Dresses & Coats</h3>
            <hr>
            <p>Here you check out our amazing cloths</p>
        </div>
        
        <div class="row mx-auto container-fluid">
        <?php include('server/get_tishirt.php'); ?>
        <?php foreach ($tishirt as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                    <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
        </div>
      </section>

      <section id="banner-area">
        <div class="owl-carousel owl-theme" >
            <div class="item" >
                <img src="image/nike-shoes.jpg" id="A" alt="Banner1">
            </div>
            <div class="item">
                <img src="image/20200629-rolex-04.png" id="A" alt="Banner2">
            </div>
            <div class="item">
                <img src="image/920632927-5782c40fd674bd8ecc6c487ece8fa4632286eb24eadfbf9a20f6e7182aba5dd9-d.png" id="A" alt="Banner3">
            </div>
            <div class="item">
                <img src="image/une_nouvelle_collection_de_t-shirts_one_piece_dispo_chez_uniqlo_des_aujourd_hui_11641.png" id="A" alt="Banner3">
            </div>
            <div class="item">
                <img src="image/share_a2_v5-cosmograph-daytona-1.png" id="A" alt="Banner3">
            </div>
            <div class="item">
                <img src="image/Z-0013244551900.jpg" id="A" alt="Banner3">
            </div>
            <div class="item">
                <img src="image/t_shirt_hateau_de_kakashi-rae655c0157b64edd92e0b6e28255c549_k2gm8_630.jpg" id="A" alt="Banner3">
            </div>
            <div class="item">
                <img src="image/ou.png" id="A" alt="Banner3">
            </div>
            
        </div>
    </section>
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_shoes.php'); ?>


         <?php foreach ($shoes as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                    <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
    </section>

    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_hoodie_pants.php'); ?>


         <?php foreach ($hoodie_pants as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                    <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>


<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
  <div class="row mx-auto container-fluid">
        <?php include('server/get_hoodie.php'); ?>


         <?php foreach ($hoodie as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                   <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>

<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_watches.php'); ?>


         <?php foreach ($watches as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                  <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>

<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_pants.php'); ?>


         <?php foreach ($pants as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                     <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>

<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_parfum.php'); ?>


         <?php foreach ($parfum as $row) { ?>


            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                   <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>

<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_cosplay.php'); ?>


         <?php foreach ($cosplay as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                     <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>

<section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr>
            <p>Here you check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_football_tishirts.php'); ?>


         <?php foreach ($football as $row) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                <div class="star">
                     <?php 
                                    $average_rating = 0;
                                    $total_review = 0;
                                    $total_user_rating = 0;
                                    $product_id = $row['products_id'];
                                    $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                                    $stmt1->bind_param('i',$product_id);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result(); 
                                while($row1 = $result->fetch_assoc() ){
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                                }
                                if($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                                }     
                                 $averageRating = round($average_rating, 0);
                                      for ($i = 1; $i <= 5; $i++) {
                                          $ratingClass = "far fa-star";
                                          if ($i <= $averageRating) {
                                              $ratingClass = "fas fa-star";
                                          };
                                      ?>
                                      <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>"
                                          aria-hidden="true"></span>
                                    <?php } ?>
                </div>
                <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
            <?php } ?>
           
        </div>
</section>



    

  

<?php include('layouts/footer.php');?>
    


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Include Owl Carousel library after jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
          const darkModeToggle = document.getElementById('toggle');
const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}

// تعديل وضع الظلام عند النقر على زر التبديل
darkModeToggle.addEventListener('click', function() {
  body.classList.toggle('dark-mode');
  
  // تحديث حالة الوضع المحفوظة في localStorage
  if (body.classList.contains('dark-mode')) {
    localStorage.setItem(darkModeKey, 'true');
  } else {
    localStorage.setItem(darkModeKey, 'false');
  }
});
</script>
<script>
 

    $(document).ready(function () {
        $("#banner-area .owl-carousel").owlCarousel({
           
                items: 1,
                margin: 30,
                autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
                
                smartSpeed: 450,
                loop: true
        });

        
        $("#top-sale .owl-carousel").owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            autoplay:true,
            responsive:{
                0:{
                    items:1.6
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
  

    });

</script>
</body>
</html>