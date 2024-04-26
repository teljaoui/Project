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