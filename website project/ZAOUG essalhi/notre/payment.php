<?php include('header.php');?>
<?php

session_start();

if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
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

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="from-weight-bold">payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center" style="margin-left: 100px;">
        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
                <?php $amount = strval($_POST['order_total_price']);  ?>
                <?php $order_id = $_POST['order_id']; ?>
            <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>
            <!--<input type="submit" class="btn btn-primary" value="Pay Now">-->
              <!-- Set up a container element for the button -->
           <div id="paypal-button-container" class="mx-auto container text-center" style="margin-left: 1000px;"></div>
           

        <?php }else if(isset($_SESSION['total']) && $_SESSION['total'] !=0 ){ ?>
            <?php $amount = strval($_SESSION['total']);  ?>
            <?php $order_id =$_SESSION['order_id']; ?>
            <p>Total payment: $<?php  echo $_SESSION['total']; ?></p>
            <!--<input type="submit" class="btn btn-primary" value="Pay Now">-->
              <!-- Set up a container element for the button -->
           <div id="paypal-button-container"  class="mx-auto container text-center" style="margin-left: 1000px;"></div>
           
            
          <?php } else { ?>
            
                   <p>You don't have an order</p>
          <?php } ?>

         
        </div>
    </section>


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
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AekH8Wy9Z7020JDhtIqL5u3g3a7PRf5mju3H-qFzjB8XF7y6XnovNCcsHabnf12UnaAx3vS-TIPvlmlE&currency=USD"></script>
   
<script>
  paypal.Buttons({
    // Order is created on the server and the order id is returned
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $amount ?>'
          }
          // use the "body" param to optionally pass additional order information
          // like product skus and quantities
        }]
      });
    },

    // Finalize the transaction on the server after payer approval
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {

        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payments.captures[0];
        alert('Transaction ' + transaction.status + ':' + transaction.id + '\n\nSee console for all available details');

        window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id ?>;
        
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');
</script>

    


</body>
</html>