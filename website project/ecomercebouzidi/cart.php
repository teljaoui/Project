<?php include('layouts/header.php');?>
<?php


if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'], "products_id");

        if (!in_array($_POST['products_id'], $products_array_ids)) {
            $product_id = $_POST['products_id'];

            $products_array = array(
                'products_id' => $_POST['products_id'],
                'products_name' => $_POST['products_name'],
                'products_price' => $_POST['products_price'],
                'products_image' => $_POST['products_image'],
                'products_quantity' => $_POST['products_quantity']
            );

            $_SESSION['cart'][$product_id] = $products_array;
        } else {
            echo '<script>alert("Product was already added to cart");</script>';
        }
    } else {
        $product_id = $_POST['products_id'];
        $products_name = $_POST['products_name'];
        $products_price = $_POST['products_price'];
        $products_image = $_POST['products_image'];
        $products_quantity = $_POST['products_quantity'];

        $products_array = array(
            'products_id' => $product_id,
            'products_name' => $products_name,
            'products_price' => $products_price,
            'products_image' => $products_image,
            'products_quantity' => $products_quantity
        );

        $_SESSION['cart'][$product_id] = $products_array;
    }

    calculateTotal();
} else if (isset($_POST['remove_product'])) {
    $product_id = $_POST['products_id'];
    unset($_SESSION['cart'][$product_id]);

    calculateTotal();
} else if (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['products_id'];
    $products_quantity = $_POST['products_quantity'];

    $products_array = $_SESSION['cart'][$product_id];

    $products_array['products_quantity'] = $products_quantity;
    $_SESSION['cart'][$product_id] = $products_array;

    calculateTotal();
} else {
    // Additional logic or fallback code can be added here if needed
   
}

function calculateTotal()
{
    $total_price = 0;
    $total_quantity = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['products_price'];
        $quantity = $value['products_quantity'];

        $total_price += $price * $quantity;
        $total_quantity += $quantity;
    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}
?>



<style>
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
</head>

<body>
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
                            <img src="<?php echo $value['products_image']; ?>" alt="">
                            <div>
                                <p><?php echo $value['products_name']; ?></p>
                                <small><span>$</span><?php echo $value['products_price']; ?></small>
                                <br>
                                <form method="POST" action="cart.php">
                                    <input type="hidden" name="products_id" value="<?php echo $value['products_id']; ?>">
                                    <input type="submit" name="remove_product" class="remove-btn" value="remove">
                                </form>
                            </div>
                        </div>
                    </td>

                    <td>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="products_id" value="<?php echo $value['products_id']; ?>">
                            <input type="number" name="products_quantity" value="<?php echo $value['products_quantity']; ?>">
                            <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                        </form>
                    </td>

                    <td>
                        <span>$</span>
                        <span class="product-price"><?php echo $value['products_quantity'] * $value['products_price']; ?></span>
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
