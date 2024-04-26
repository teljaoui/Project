<?php include('header.php');
session_start();
?>

<?php
if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'], "properties_id");

        if (!in_array($_POST['properties_id'], $products_array_ids)) {
            $properties_id = $_POST['properties_id'];

            $products_array = array(
                'properties_id' => $_POST['properties_id'],
                'properties_name' => $_POST['properties_name'],
                'properties_price' => $_POST['properties_price'],
                'properties_image' => $_POST['properties_image'],
              
            );

            $_SESSION['cart'][$properties_id] = $products_array;
        } else {
            echo '<script>alert("Product was already added to cart");</script>';
        }
    } else {
        $properties_id = $_POST['properties_id'];
        $properties_name = $_POST['properties_name'];
        $properties_price = $_POST['properties_price'];
        $properties_image = $_POST['properties_image'];
       

        $products_array = array(
            'properties_id' => $properties_id,
            'properties_name' => $properties_name,
            'properties_price' => $properties_price,
            'properties_image' => $properties_image,
            
        );

        $_SESSION['cart'][$properties_id] = $products_array;
    }

    calculateTotal();
} else if (isset($_POST['remove_product'])) {
    $properties_id = $_POST['properties_id'];
    unset($_SESSION['cart'][$properties_id]);

    calculateTotal();
} else if (isset($_POST['edit_quantity'])) {
    $properties_id = $_POST['properties_id'];
    $properties_array = $_SESSION['cart'][$properties_id];

    // Update the properties_array with the new values

    $_SESSION['cart'][$properties_id] = $properties_array;

    calculateTotal();
} else {
    // Additional logic or fallback code can be added here if needed
}

function calculateTotal()
{
    $total_price = 0;

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $price = $value['properties_price'];
            $total_price += $price;
        }
    }

    $_SESSION['total'] = $total_price;
}
?>




<style>
     body{
            height: 2000px;
            width: 2000px;
        }
        #btn{
            width: 20px;
            height: 20px;
            border: none;
            background: #fa0;
            cursor: pointer;
            position: fixed;
            bottom: 10px;
            right: 10px;
            display: none;
        }
    .cart .remove-btn {
        color: red;
        text-decoration: none;
        font-size: 14px;
        background-color: white;
        border: none;
        width: 100%;
    }

    .cart .edit-btn {
        color: red;
        text-decoration: none;
        background-color: white;
        font-size: 15px;
        border: none;
    }
  
 


  


img{
    width: 70%;
}
  


</style>
</head>

<body>
<button id="btn">^</button>
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php if(isset($_SESSION['cart'])){ ?>
            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="img/<?php echo $value['properties_image']; ?>" alt="">
                            <div>
                                <p><?php echo $value['properties_name']; ?></p>
                                <small><span>DH</span><?php echo $value['properties_price']; ?></small>
                                <br>
                                <form method="POST" action="sales.php">
                                    <input type="hidden" name="properties_id" value="<?php echo $value['properties_id']; ?>">
                                    <input type="submit" name="remove_product" class="btn" value="remove">
                                </form>
                            </div>
                        </div>
                    </td>

                    

                    <td>
                        <span>$</span>
                        <span class="properties-price"><?php echo $value['properties_price']; ?></span>
                    </td>
                </tr>
            <?php } ?>
            <?php } ?>
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <?php if(isset($_SESSION['cart'])){ ?>
                    <td>$<?php echo $_SESSION['total']; ?></td>
                    <?php } ?>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form method="POST" action="checkout.php">
                <button type="submit" class="btn checkout-btn" name="checkout">Checkout</button>
                
            </form>
        </div>
    </section>
</body>
<script>
    let btn = document.getElementById('btn');
    window.onscroll= function(){
        if(scrollY >= 400){
            btn.style.display = 'block'
        }
        else{
            btn.style.display = 'none'
        }
    }
    btn.onclick = function(){
        scroll({
            left:0,
            top:0,
            behavior:"smooth"
        })
    }
</script>
</html>
