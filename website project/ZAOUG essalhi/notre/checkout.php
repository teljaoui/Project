<?php include('header.php');?>
<?php
session_start();

if( !empty($_SESSION['cart'])){

}else{
    header('location: index.php');
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
<body>
  

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="from-weight-bold">checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" method="POST" id="checkout-form">
                <p class="text-center" style="color: red;">
                <?php if(isset($_GET['message'])){ echo $_GET['message'];} ?>
                <?php if(isset($_GET['message'])){ ?>

                    <a href="login.php" class="btn btn-primary">Login</a>
                 <?php }; ?>
            </p>
                <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="checkout-Name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">City </label>
                    <input type="text" class="form-control" id="checkout-conpassword" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="checkout-Address" name="address" placeholder="Address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="place_order">
                </div>
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