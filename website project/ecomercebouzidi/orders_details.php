<?php include('layouts/header.php');?>
<?php
include('server/connectiom.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();
    $order_total_price = calculateTotalOrder($order_details);
} else {
    header('Location: account.php');
    exit;
}

function calculateTotalOrder($order_details){
    $total = 0;
    foreach($order_details as $row){
        $product_price = $row['products_price'];
        $product_quantity = $row['products_quantity'];
        $total = $total + $product_price * $product_quantity;
    }
    return $total;
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
 </style>
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order details</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Products</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php foreach($order_details as $row){ ?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="<?php echo $row['products_image']; ?>" alt="">
                    <div>
                        <p class="mt-3"><?php echo $row['products_name']; ?></p>
                    </div>
                </div>
            </td>
            <td>
                <span>$<?php echo $row['products_price']; ?></span>
            </td>
            <td>
                <span><?php echo $row['products_quantity']; ?></span>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php if($order_status == "not paid"){ ?>
    <form action="payment.php" style="float: right;" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
        <input type="submit" name="order_pay_btn" class="btn btn-warning" style="color: white;" value="Pay Now">
    </form>
    <?php } ?>
</section>

</body>
<script>
    const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}
</script>
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
</html>
