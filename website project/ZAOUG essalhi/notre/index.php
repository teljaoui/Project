<?php include "server/get_featured.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>real estate website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

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
    </style>

<body>
 <?php include "header.php" ?>



    <!-- Home -->
    <button id="btn">^</button>
    <section class="home container" id="home">

        <div class="home-text">

            <h1>Find Your Next <br>
                Perfect Place To <br>
                Live.</h1>

            <a href="sign-up.php" class="btn">Sign Up</a>

        </div>

    </section>

    <!-- Home -->








    <!-- about -->

    <section class="about container" id="about">

        <div class="about-img">

            <img src="img/about.jpg" alt="">

        </div>

        <div class="about-text">

            <span>About Us</span>

            <h2>We Provide The Best <br>Property For You !</h2>

            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto debitis duc</p>

            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto debitis duc</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, solut</p>

                <a href="#" class="btn">Learn More</a>

        </div>

    </section>
    <!-- about -->
    <!-- sales -->

    <section class="sales container" id="sales">

        <!-- Box 1 -->

        <div class="box">

            <i class='bx bx-home-alt'></i>

            <h3>profitez maximum</h3>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, aut.</p>

        </div>

        <!-- Box 2-->

        <div class="box">

            <i class='bx bx-home-alt'></i>

            <h3>profitez maximum</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, aut.</p>

        </div>
        <!-- Box 3 -->
        <div>

            <div class="box">

                <i class='bx bx-home-alt'></i>

                <h3>Enjoy Your New Home</h3>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, aut.</p>

            </div>

    </section>

    <!-- sales -->
    <!--properties -->

    <section class="properties container" id="properties">

        <div class="heading">

            <span>Recent</span>

            <h2>Our Featured Properties</h2>

            <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Odio, laborum

        </div>

        <div class="properties-container container">

            <!-- Box 1 -->
          <?php
          foreach($properties_array as $row){
          ?>
            <div class="box">

                <a href="<?php echo "shops.php?properties_id=". $row['properties_id'];?>"><img src="img/<?php echo $row['properties_image']; ?>" alt=""></a>

                <h3><?php echo $row['properties_price'];?>DH</h3>

                <div class="content">

                    <div class="text">

                        <h3><?php echo $row['properties_name']; ?></h3>

                        <p><?php echo $row['properties_category']; ?></p>

                    </div>

                    <div class="icon">

                        <i class='bx bx-bed'><span>5</span></i>

                        <i class='bx bx-bath'><span>2</span></i>

                    </div>

                </div>

            </div>
            <?php  } ?>




        </div>
        <!--properties -->
    </section>
    <!--properties -->

    <!-- News Letter -->

    <section ion class="newsletter container">

        <h2>Have Question in mind? <br>Let us help you</h2>

        <form action="">

            <input type="email" name="" id="email-box" placeholder="yourmail@gmail.com" required>

            <input type="submit" value="Send" class="btn">

        </form>

    </section>
    <?php include"footer.php" ?>
  <!--copyright-->

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