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

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating System in PHP & Mysql using Ajax</h1>
    	<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span ><?php printf('%.1f', $average_rating);  ?></span> / 5</b>
    					</h1>
    					<div class="mb-3">
                        <?php
				$averageRating = round($average_rating, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "far fa-star";
					if($i <= $averageRating) {
						$ratingClass = "fas fa-star";
					}
				?>
				
				  <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>" aria-hidden="true"></span>
					
				<?php } ?>	
	    				</div>
    					<h3><span id="total_review"><?php echo $total_review ; ?></span> Review</h3>
    				</div>
                   
      



        <?php if($five_star_review !=0){
			$fiveStarRatingPercent = round(($five_star_review/($five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review))*100);
            $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';
           }
           if($four_star_review !=0){
            $fourStarRatingPercent = round(($four_star_review/($five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review))*100);
            $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
           }
           if($three_star_review !=0){
            $threeStarRatingPercent = round(($three_star_review/($five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review))*100);
            $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
           }
           if($two_star_review !=0){
            $twoStarRatingPercent = round(($two_star_review/($five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review))*100);
            $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
           }
           if($one_star_review !=0){
            $oneStarRatingPercent = round(($one_star_review/($five_star_review + $four_star_review + $three_star_review + $two_star_review + $one_star_review))*100);
            $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
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
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"> 
     
           <?php   $product_id = $_GET['products_id'];
$stmt = $conn->prepare("SELECT * FROM review_table WHERE product_id=? ");

$stmt->bind_param('i',$product_id);

$stmt->execute();

$result = $stmt->get_result();


while($row = $result->fetch_assoc() ){ ?>
       <hr>
       <p><?php echo $row["user_name"]; ?></p>
       <p><?php echo $row["user_review"]; ?></p>
       <p><?php echo date('l jS, F Y h:i:s A', $row["datetime"]); ?></p>

       <?php
$averageRating = round($row["user_rating"], 0);
for ($i = 1; $i <= 5; $i++) {
   $ratingClass = "far fa-star";
   if($i <= $averageRating) {
       $ratingClass = "fas fa-star";
   }
?>


 <span class="glyphicon glyphicon-star <?php echo $ratingClass; ?>" aria-hidden="true"></span>
 <?php } ?>
<?php } ?>	


           <div class="review-block-rate">

           </div>
           
       </div>
       <?php }?>
       <?php }?>
   
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

