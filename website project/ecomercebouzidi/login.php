
<?php
 

 include('layouts/header.php');
include('server/connectiom.php');

if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password,usser_image FROM users WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){
        $stmt->bind_result($user_id,$user_name,$user_email,$user_password,$usser_image);

        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['usser_image']= $usser_image;
            $_SESSION['logged_in'] = true;

            header('location: account.php?login_success=logged in successfully');
        }else{
            header('location: login.php?error=could not verify your account');
        }

    }else{

        header('location: login.php?error=something went wrong');


    }

}




?>
<?php ?>
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
   
    <!--LOGINE-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="from-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="login.php" method="POST" id="Login-form">
                <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="Login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="Login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="Login-btn" name="login_btn" value="Login">
                </div>
                <div class="form-group">
                   <a id="register-url" href="register.php" class="btn">Don't have accont? Register</a>
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