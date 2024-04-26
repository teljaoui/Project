<?php include('layouts/header.php');?>
<?php

include('server/connectiom.php');
if(isset($_POST['search'])){


    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        $page_no = $_GET['page_no'];
    }else{
        $page_no = 1;
    }
    $category = $_POST['category'];
    $price = $_POST['price'];


    $stmt= $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE products_category=? AND products_price<=?");

    $stmt->bind_param('si',$category,$price);

    $stmt->execute();

    $stmt->bind_result($total_records);

    $stmt->store_result();

    $stmt->fetch();

    
    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    
    $stmt2 = $conn->prepare("SELECT * FROM products WHERE products_category=? AND products_price<=? LIMIT $offset,$total_records_per_page");
    $stmt2->bind_param("si",$category,$price);
    $stmt2->execute();
    $products = $stmt2->get_result();

  }else{

    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        $page_no = $_GET['page_no'];
    }else{
        $page_no = 1;
    }

    $stmt1= $conn->prepare("SELECT COUNT(*) As total_records FROM products ");

    $stmt1->execute();

    $stmt1->bind_result($total_records);

    $stmt1->store_result();

    $stmt1->fetch();

    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();


}



?>
<?php
include('server/connectiom.php');
$stmt2 = $conn->query('SELECT * FROM products ORDER BY products_id DESC');
if(isset($_GET['s']) && !empty($_GET['s'])){
  $recherche = htmlspecialchars($_GET['s']);
  $allusers = $conn->query('SELECT * FROM products WHERE products_name LIKE "%'.$recherche.'%" OR products_tags LIKE "%'.$recherche.'%" OR products_description LIKE "%'.$recherche.'%" ORDER BY products_id DESC');

}
?>





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
  --background-color: #ffffff; /* Background color in normal mode */
  --text-color: #000000; /* Text color in normal mode */
}

body {
  background-color: var(--background-color);
  color: var(--text-color);
}

#header {
  background-color: var(--background-color);
  color: var(--text-color);
}

.sidebar {
  background-color: var(--background-color);
  color: var(--text-color);
}

#navbar li a {
  color: var(--text-color);
}

body.dark-mode {
  --background-color: #181818; /* Background color in dark mode */
  --text-color: #ffffff; /* Text color in dark mode */
}

#header.dark-mode {
  --background-color: #181818; /* Background color in dark mode */
  --text-color: #ffffff; /* Text color in dark mode */
}

#navbar li a.dark-mode {
  --text-color: #ffffff;
}

.sidebar.dark-mode {
  --background-color: #181818; /* Background color in dark mode */
  --text-color: #ffffff; /* Text color in dark mode */
}
#navbar{
    background-color: var(--background-color);
}


  #navbar.dark-mode {
    --background-color: #181818; 
}


  body {
  margin: 0;
  padding: 0;
}

.sidebar {
  height: 100vh;
  width: 200px;
  background-color: #181818;
  position: fixed;
  top: 0;
  left: -200px;
  transition: left 0.3s;
}

.sidebar.open {
  left: 0;
}

.sidebar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

.sidebar li a {
  text-decoration: none;
  color: #000000;
}

.sidebar li:hover {
  background-color: #ccc;
}

.toggle-btn {
 
  position: absolute;
  top: 100px;
  left: 10px;
  cursor: pointer;

}
.toggle-btn i{
  width: 530px;
        height: 50px;
}

.search{
        margin-left: 300px;
        
    }
    .s{
        border-radius: 15px 0 0 15px;
        width: 530px;
        height: 50px;
        margin-top: 30px;
    }
    .icon{
        margin-left: 530px;
        margin-top: -50px;
        height: 50px;
        width: 70px;
        border-radius: 0 15px 15px 0px; 
        

        }
        .search{
            margin-left: 490px;
        }
        .pagination{
          margin-left: 600px;
        }

        @media (max-width:799px){
            .s{
                margin-left: -220px;
                width: 250px
            }
            .icon{
                width: 50px;
                margin-left: 10px;
            }
            .search{
            margin-left: 340px;
        }
        .pagination{
          margin-left: 130px;
        }

        }

       

main{

    
}
section{
  
}
</style>




  <main>
  


            
  


  <section id="prod1" class="section-p1 my-5">
  <form action="" method="GET">
  <div class="search">
        <div class="form-group">
    <input type="search" name="s" class="s form-control">
    <div class="form-group">
    <button type="submit" class="icon form-control"><i class="fal fa-search"></i></button>
    </div>
        </div>
    </div>
  </form>
  <div class="pro-container">
    <div class="row mx-auto container-fluid">
      <?php
      
        if(isset($allusers)){
          while ($row = $allusers->fetch_assoc()) { ?>
             <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
          <?php } 
        }else if(isset($products)){
          while ($row = $products->fetch_assoc() ) {
      ?>
        
          
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <h4 class="p=price">$<?php echo $row['products_price'] ?></h4>
                <a href="<?php echo "single_product.php?products_id=". $row['products_id']."&products_category=".$row['products_category'];  ?>"><button class="buy-btn">Buy Now <i class="fal fa-shopping-cart cart"></i></button></a>
            </div>
          
        <?php }}else{
          echo "";
        } ?>
        
     
      
    </div>
  </div>
</section>
</main>


        
        
           


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
           </div>
        
    
           
            
    </section>

      <?php include('layouts/footer.php');?>


    <div class="sidebar" id="sidebar">
  <section id="search" class="my-5 py-5 ms-2">
    <br><br>
  
    <form action="shop.php" method="POST">
      <div class="row mx-auto container">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <p>Category</p>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="shoes" name="category" id="category_one" <?php if(isset($category) && $category=='shoes'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault1">
              Shoes
            </label>
          </div>
          
          <div class="from-check">
            <input type="radio" class="from-check-input" value="watches" name="category" id="category_three" <?php if(isset($category) && $category=='watches'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault3">
              Watches
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="tishirt" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Tishirt
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="parfum" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Parfum
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="pants" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Pants
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="hoodie" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Hoodie
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="hoodie_pants" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Hoodie Pants
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="football_tishirts" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Football Tishirts
            </label>
          </div>
          <div class="from-check">
            <input type="radio" class="from-check-input" value="cosplay" name="category" id="category_four" <?php if(isset($category) && $category=='bags'){echo 'checked';} ?>>
            <label class="from-check-label" for="flexRadioDefault4">
            Cosplay
            </label>
          </div>
        
        </div>
      </div>
   
      <div class="row mx-auto container mt-5">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <p>Price</p>
          <input type="range" class="from-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{echo "100";} ?>" min="1" max="1000" id="customRange2">
          <div class="w-50">
            <span style="float: left;">1</span>
            <span style="float: right;">1000</span>
          </div>
        </div>
      </div>

      <div class="from-group my-3 mx-3">
        <input type="submit" name="search" value="Search" class="btn btn-primary">
      </div>
    </form>
  </section>
  <div class="toggle-btn" onclick="toggleSidebar()">
<i class="fal fa-bars"></i>
</div>
</div>

<div class="toggle-btn" onclick="toggleSidebar()">
<i class="fal fa-bars"></i>
</div>




    <script>
function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("open");
}
</script>


</body>

<script>
  
const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}


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
</html>