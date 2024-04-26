<?php include('layouts/header.php');?>
<?php

 include('server/connectiom.php');

 if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
 }
 if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        
        unset($_SESSION['usser_image']);
        
        header('location: login.php');
        exit;
    }
 }

 if(isset($_POST['change_password'])){

    $password = $_POST['password'];
    $confirm_passwod = $_POST['confrimPassword'];
    $user_email = $_SESSION['user_email'];

    if($password !== $confirm_passwod){
        header('location: account.php?error=passwords dont match');
    }
    else if(strlen($password) <6){
        header('location: account.php?error=passwords must be least 6 charachters');
    }else{
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss',md5($password),$user_email);

        if($stmt->execute()){
            header('location: account.php?message=password has been updated successfully');
        }else{
            header('location: account.php?error=could not updated password');
        }

    }

 }

 if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

    $stmt->bind_param('i',$user_id);
    $stmt->execute();

    $orders = $stmt->get_result();
 }


?>



<style>
    .orders .order-details-btn{
                color: #fff;
                background-color: #D4AF37;
            }
        #change-pass-btn{
                color: #fff;
                background-color: #D4AF37;
            }


   .orders .product-info{
    display: flex;
    flex-wrap: wrap;
}
.orders th{
    padding: 5px 20px;
    color: #fff;
    background-color: #D4AF37;
/*text-align: left;*/          
}
/*.orders th:nth-child(2){
    text-align: right;
}*/
.orders td{
    padding: 10px 20px;
}
.orders td img{
    width: 80px;
    height: 80px;
    margin-right: 10px;
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
a{
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
a .dark-mode{
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
    <div class="row container mx-auto">
        <?php if(isset($_GET['payment_message'])){ ?>
            <p class="mt-5 text-center" style="color: green;"><?php echo $_GET['payment_message']; ?></p>

            <?php } ?>
        
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p class="text-center" style="color: green;"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?></p>
            <p class="text-center" style="color: green;"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?></p>
            <h3 class="font-weight-bolde">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name:<span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></span></p>
                <p>Email:<span><?php if (isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?></span></p>
                
                <p><a href="" id="order-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">lagout</a></p>
            </div>
        </div>
    
    <div class="col-lg-6 col-md-12 col-sm-12">
    <form action="image.php" enctype="multipart/form-data" id="edit-image-from" method="POST">

              <input type="hidden" name="user_name" value="<?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?>">
            <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'];} ?>">
        
            <label for="">Image1</label>
        <input type="file" class="form-control"  id="image1" name="image1" placeholder="Image 1" required>
        <input type="submit" name="add">
        </form>
        <form action="account.php" method="POST" id="account-form">
            <p class="text-center" style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
            <p class="text-center" style="color: green;"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
            <h3>Change pasword</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label for="">password</label>
                <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Confrim password</label>
                <input type="password" class="form-control" id="account-password-conf" name="confrimPassword" placeholder="Confrim Password">
            </div>
            <div class="form-group">
                <button type="submit"   name="change_password" style="color: white;" class="btn" id="change-pass-btn">Change Password</button>
            </div>
        </form>
    </div>
    </div>
</section>
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Order id</th>
            <th>Order cost</th>
            <th>Order status</th>
            <th>Order Date</th>
            <th>Orders details</th>

        </tr>

        <?php while($row = $orders->fetch_assoc() ){ ?>
        <tr>
            <td>
            <!--<div class="product-info">
                <img src="" alt="">
                <div>
                    <p class="mt-3"><?php echo $row['order_id']; ?></p>
                </div>
            </div>-->
            <span><?php echo $row['order_id']; ?></span>
            </td>
            <td>
                <span><?php echo $row['order_cost']; ?></span>
            </td>
            <td>
                <span><?php echo $row['order_status']; ?></span>
            </td>
            <td>
                <span><?php echo $row['order_date']; ?></span>
            </td>
            <td>
                <form action="orders_details.php" method="POST">
                    <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                    <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                    <button  type="submit" name="order_details_btn" class="btn order-details-btn" >Details</button>
                </form>
            </td>
        </tr>

        <?php } ?>
    </table>
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