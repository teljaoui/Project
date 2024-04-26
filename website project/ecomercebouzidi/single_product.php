<?php include('layouts/header.php');?>
<?php
include('server/connectiom.php');
include('rating.php');
include('server/get_featured.php');




if(isset($_GET['products_id'])){

    $product_id = $_GET['products_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE products_id = ?");
    $stmt->bind_param("i",$product_id);

    $stmt->execute();

    $product = $stmt->get_result();



}
else{
    
}
if(isset($_GET['products_id'])){

    $product_id = $_GET['products_id'];
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE products_id = ?");
    $stmt->bind_param("i",$product_id);
    
    $stmt->execute();
    
    $productes = $stmt->get_result();
    
    
    
    }


if(isset($_GET['products_category'])){
    $category = $_GET['products_category'];
$stmt = $conn->prepare("SELECT * FROM products WHERE products_category LIKE ?");
$stmt->bind_param("s",$category);

$stmt->execute();
$products = $stmt->get_result();
$products_arraye = $products->fetch_all(MYSQLI_ASSOC);
shuffle($products_arraye);
}

if(isset($_GET['products_id'])){

    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    
    
    $product_id = $_GET['products_id'];
        $stmt = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
       
        $stmt->bind_param('i',$product_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        
    while($row = $result->fetch_assoc() ){

        $user_name	=$row["user_name"];
			$user_review=$row["user_review"];
			$rating	=$row["user_rating"];
			$datetime	=date('l jS, F Y h:i:s A', $row["datetime"]);
    
        if($row["user_rating"] == '5')
        {
            $five_star_review++;
        }
    
        if($row["user_rating"] == '4')
        {
            $four_star_review++;
        }
    
        if($row["user_rating"] == '3')
        {
            $three_star_review++;
        }
    
        if($row["user_rating"] == '2')
        {
            $two_star_review++;
        }
    
        if($row["user_rating"] == '1')
        {
            $one_star_review++;
        }
    
        $total_review++;
    
        $total_user_rating += $row["user_rating"];
    
    }
    if($total_user_rating && $total_review) {
      $average_rating = $total_user_rating / $total_review;
    }	
    
    
    }
   

?>


   

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

  
  /* وضع الظلام */
  body.dark-mode {
    --background-color: #181818; /* لون الخلفية في وضع الظلام */
    --text-color: #ffffff; /* لون النص في وضع الظلام */
  }

  #header.dark-mode {
    --background-color: #181818; /* لون الخلفية في وضع الظلام */
    --text-color: #ffffff; /* لون النص في وضع الظلام */
  }
  #navbar li a .dark-mode{
    --text-color: #ffffff;
}

#navbar{
    background-color: var(--background-color);
}


  #navbar.dark-mode {
    --background-color: #181818; 
}

        .review {
            color: rgb(255, 215, 36);
            cursor: pointer;
            transition: 0.4s ease-in-out;
        }

        i.hovered {
            font-weight: 900;
            font-family: "Font Awesome 5 Free";
        }

        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }
        .rating-css input {
            display: none;
        }
        .rating-css input + label {
            font-size: 30px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }
        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }
        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
      
        /* End of Star Rating */
    </style>

</head>
<body>



    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        
      <?php if(isset($_GET['review_message'])){ ?>
    <p class="text-center" style="color: green;font-size: 100px;"><?php echo $_GET['review_message']; ?></p>
    <?php } ?>
    <?php if(isset($_GET['review_failed'])){ ?>
    <p class="text-center" style="color: red;"><?php echo $_GET['review_failed']; ?></p>
    <?php } ?>
    
      <?php if(isset($product)){ ?>
      <?php while($row = $product->fetch_assoc()){ ?>
       
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pd-1" src="<?php echo $row['products_image']; ?>" alt="" id="mainImage">
              <div class="small-img-group">
                <div class="small-img-col">
                    <img src="<?php echo $row['products_image']; ?>" width="100%"  class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $row['products_image2']; ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $row['products_image3']; ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $row['products_image4']; ?>" width="100%" class="small-img" alt="">
                </div>
              </div>
            
        </div>

           
          <div class="col-lg-6 col-md-12 col-12">
            <h6>oussama</h6>
            <h3 class="py-4"><?php echo $row['products_name']; ?></h3>
            <h2><?php echo $row['products_price']; ?>$</h2>

            <form method="POST" id="form1" action="cart.php">
              <input type="hidden" name="products_id" value="<?php echo $row['products_id']; ?>">
            <input type="hidden" name="products_image" value="<?php echo $row['products_image']; ?>">
            <input type="hidden" name="products_name" value="<?php echo $row['products_name']; ?>">
            <input type="hidden" name="products_price" value="<?php echo $row['products_price']; ?>">

            <input type="number" name="products_quantity" value="1">
            <button type="submit" class="buy-btn"  name="add_to_cart" >Ade to Cart</button>
            
            

      </form>
       
            <h4 class="mt-5 mb-5">Porduct details</h4>
            <span><?php echo $row['products_description']; ?></span>
          </div> 
          <?php }?>
          <?php }?>
        </div>
      </section>

        <section id="top-sale">
        <div class="container text-center">
            <h3>Our featured</h3>
            <hr>
            <p></p>
        </div>

        <section id="rating">
            
            <?php while ($row = $productes->fetch_assoc()) { ?>
                     <form id="form2" action="rating.php"  method="POST">
                     <input type="hidden" name="products_id" value="<?php echo $row['products_id']; ?>">
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="fas fa-times-circle" style="border: none;background-color: white;;" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            
                                
                                  <div class="modal-body">
                                    <div class="rating-css">
                                        <div class="star-icon">
                                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="product_rating" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="product_rating" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="product_rating" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="product_rating" id="rating5">
                                            <label for="rating5" class="fa fa-star"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto container">
                                    <label for="nom">name and prenom:</label><br>
                                    <div class="form-group">
                                    <input type="text" name="nom" style="width: 100%;" class="form-control" id="nom">
                                   </div>
                                    <label for="review">review:</label>
                                    <div class="form-group">
                                    <textarea name="review" class="form-control" id="review" cols="10" rows="10"></textarea>
                                 </div>
                                 </div>
            
                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="rating" class="btn btn-secondary" >rating</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                  <?php }?>
                  <div class="container">
    <div class="row">
        <div class="col-sm-4 text-center">
            <h1 class="text-warning mt-4 mb-4">
                <?php printf('%.1f', $average_rating); ?> / 5
            </h1>
            <div class="mb-3">
            <?php
				$averageRating = round($average_rating, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "btn-default btn-grey";
					if($i <= $averageRating) {
						$ratingClass = "btn-warning";
					}
				?>
                <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>" aria-hidden="true"></span>
                
                <?php } ?>
            </div>
            <h3><?php echo $total_review; ?> Review</h3>
        </div>

        <?php
        $total_reviews = $five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review;

        if ($total_reviews > 0) {
            $fiveStarRatingPercent = round(($five_star_review / $total_reviews) * 100);
            $fiveStarRatingPercent = $fiveStarRatingPercent . '%';

            $fourStarRatingPercent = round(($four_star_review / $total_reviews) * 100);
            $fourStarRatingPercent = $fourStarRatingPercent . '%';

            $threeStarRatingPercent = round(($three_star_review / $total_reviews) * 100);
            $threeStarRatingPercent = $threeStarRatingPercent . '%';

            $twoStarRatingPercent = round(($two_star_review / $total_reviews) * 100);
            $twoStarRatingPercent = $twoStarRatingPercent . '%';

            $oneStarRatingPercent = round(($one_star_review / $total_reviews) * 100);
            $oneStarRatingPercent = $oneStarRatingPercent . '%';
        } else {
            // Handle the case where there are no reviews
            $fiveStarRatingPercent = '0%';
            $fourStarRatingPercent = '0%';
            $threeStarRatingPercent = '0%';
            $twoStarRatingPercent = '0%';
            $oneStarRatingPercent = '0%';
        }
        ?>

  
                    <div class="col-sm-4">
                        <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $five_star_review; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress" style="width: <?php echo $fiveStarRatingPercent; ?>"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress-label-right">(<span id="total_four_star_review"><?php echo $four_star_review; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress" style="width: <?php echo $fourStarRatingPercent; ?>"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress-label-right">(<span id="total_three_star_review"><?php echo $three_star_review; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress" style="width: <?php echo $threeStarRatingPercent; ?>"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress-label-right">(<span id="total_two_star_review"><?php echo $two_star_review; ?></span>)</div>
                            <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress" style="width: <?php echo $twoStarRatingPercent; ?>"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                <div class="progress-label-right">(<span id="total_one_star_review"><?php echo $one_star_review; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress" style="width: <?php echo $oneStarRatingPercent; ?>"></div>
                            </div>
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="mt-4 mb-3"><span></span></h3><br>
                        <button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">review</button>
                    </div>
                </div>
                </div>
                </section>
        
        
        <section id="featured" class="my-5">
    <div class="container py-5">
        <div class="owl-carousel owl-theme">
        
        <?php foreach ($products_arraye as $row) { ?>
                <div class="item cart">
                    <div class="pra product text-center">
                        <img src="<?php echo $row['products_image'] ?>" class="img-fluid mb-3" alt="">
                        <div class="star">
                            <?php 
                            $average_rating = 0;
                            $total_review = 0;
                            $total_user_rating = 0;
                            $product_id = $row['products_id'];
                            $stmt1 = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
                            $stmt1->bind_param('i', $product_id);
                            $stmt1->execute();
                            $result = $stmt1->get_result(); 
                            while ($row1 = $result->fetch_assoc()) {
                                $total_review++;
                                $total_user_rating += $row1["user_rating"];
                            }
                            if ($total_user_rating && $total_review) {
                                $average_rating = $total_user_rating / $total_review;
                            }
                            $averageRating = round($average_rating, 0);
                            for ($i = 1; $i <= 5; $i++) {
                                $ratingClass = "far fa-star";
                                if ($i <= $averageRating) {
                                    $ratingClass = "fas fa-star";
                                }
                            ?>
                                <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>" aria-hidden="true"></span>
                            <?php } ?>
                        </div>
                        <h5 class="p-name"><?php echo $row['products_name']; ?></h5>
                        <h4 class="p-price">$<?php echo $row['products_price'] ?></h4>
                        <a href="<?php echo "single_product.php?products_id=" . $row['products_id'] . "&products_category=" . $row['products_category']; ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


    <div class="container">
	<div class="mt-5" id="review_content">
        <h1 style="color: #D4AF37;">Comment:</h1>
        <hr>
		<?php
		$product_id = $_GET['products_id'];
		$stmt = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");
		$stmt->bind_param('i', $product_id);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) {
		?>
			<p><?php echo $row["user_name"]; ?></p>
			<p><?php echo $row["user_review"]; ?></p>
			<p><?php echo date('l jS, F Y h:i:s A', $row["datetime"]); ?></p>
			<?php
			$averageRating = round($row["user_rating"], 0);
            for ($i = 1; $i <= 5; $i++) {
                $ratingClass = "far fa-star";
                if ($i <= $averageRating) {
                    $ratingClass = "fas fa-star";
                }
			?>
				<span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>" aria-hidden="true"></span>
			<?php } ?>
			<hr>
		<?php } ?>
		<div class="review-block-rate"></div>
	</div>

</div>

									
				
		

        

        
  </section>

  <?php include('layouts/footer.php');?>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Include Owl Carousel library after jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
            
<script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');

    const nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active')
        })
    }
    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active')
        })
    }

</script>
<script>

const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}



    var mainImage = document.getElementById("mainImage");
var smallimg = document.getElementsByClassName("small-img");

for (let i = 0; i < 4; i++) {
  smallimg[i].onclick = function() {
    mainImage.src = smallimg[i].src;
  }
}


  const myModal = document.getElementById('exampleModal');
        const myInput = document.getElementById('nom');

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });

   


</script>
<script>
        $(document).ready(function () {
       

        
        $("#top-sale .owl-carousel").owlCarousel({
            loop:true,
            nav:true,
            dots:false,
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