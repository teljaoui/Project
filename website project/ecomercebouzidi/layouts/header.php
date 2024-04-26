
<?php session_start();
include('server/connectiom.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    
    <link rel="stylesheet" href="owl-car/css/owl.carousel.min.css">
    <link rel="stylesheet" href="owl-car/css/owl.theme.default.min.css">
    <title>Document</title>
</head>
<style>
   
    .cart-quantity{
    background-color: #fb774b;
    color: #fff;
    padding: 2px 5px;
    border-radius: 50%;
    margin: -5px;
    font-size: 0.8rem;
}


</style>


<body>
    <section id="header">
        <a href="ou.php"><img src="imag/Untitled-4.png" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="ou.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-bag"  aria-hidden="true">
                <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0){ ?>
                     <span class="cart-quantity" ><?php echo $_SESSION['quantity']; ?></span>
                <?php } ?>
                </i></a></li>
                <li id="lg-bag"><?php if(isset($_SESSION['usser_image']) && $_SESSION['usser_image']!=0 ){ ?>
            
            <a href="account.php"><img src="<?php  echo $_SESSION['usser_image'];?>" style="width: 50px;position: relative;top: 10px;" alt=""></a>
           <?php }else{ ?>
            <a href="account.php"><i class="fas fa-user" aria-hidden="true"></i></a>
            <?php } ?>
          </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>

            </ul>
        </div>
       
        <div id="mobile">
            <a href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true">
               <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0){ ?>
                     <label class="cart-quantity"><?php echo $_SESSION['quantity']; ?></label>
                <?php } ?>
            </i></a>
            <?php if(isset($_SESSION['usser_image']) && $_SESSION['usser_image']!=0 ){ ?>
            
                <a href="account.php"><img src="<?php  echo $_SESSION['usser_image'];?>" style="width: 50px;position: relative;left: 5px;top: 5px;" alt=""></a>
               <?php }else{ ?>
                <a href="account.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                <?php } ?>
              
            <i id="bar" class="fas fa-outdent"></i>

        </div>

    </section>